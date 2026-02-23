<?php
namespace App\Controllers;
use App\Models\PagoModel;
use App\Models\UsuarioModel;

use CodeIgniter\I18n\Time;
use Dompdf\Dompdf;
use Dompdf\Options;

class Pagos extends BaseController {
    
    public function index() {
        $pagoModel = new PagoModel();
        $data['pagos'] = $pagoModel->getPagosConUsuarios();
        return view('pagos/lista', $data);
    }



    public function guardar() {
        $pagoModel = new PagoModel();
        
        $pagoModel->save([
            'usuario_id'  => $this->request->getPost('usuario_id'),
            'monto'       => $this->request->getPost('monto'),
            'mes_pagado'  => $this->request->getPost('mes'),
            'anio_pagado' => date('Y'),
            'fecha_pago'  => date('Y-m-d'),
            'metodo_pago' => $this->request->getPost('metodo'),
			'nota'  => $this->request->getPost('nota'),
        ]);

        return redirect()->to('/pagos')->with('mensaje', 'Pago registrado con éxito');
    }

	public function generarPDF($id_pago)
	{
	    $pagoModel = new PagoModel();

	    // Obtenemos los datos uniendo con la tabla de usuarios y planes
	    $pago = $pagoModel->select('pagos.*, usuarios.*, planes.nombre_plan as plan_nombre')
	                      ->join('usuarios', 'usuarios.id = pagos.usuario_id')
	                      ->join('planes', 'planes.id = usuarios.plan_id')
	                      ->where('pagos.id', $id_pago)
	                      ->first();

	    if (!$pago) {
	        return redirect()->to('/pagos')->with('error', 'Pago no encontrado');
	    }

	    // Configuración de Dompdf
	    $options = new \Dompdf\Options();
	    $options->set('isRemoteEnabled', true);
	    $dompdf = new \Dompdf\Dompdf($options);

	    // Cargamos la vista del recibo y le pasamos los datos
	    $html = view('pagos/recibo_pdf', ['pago' => $pago]);

	    $dompdf->loadHtml($html);
	    $dompdf->setPaper('A5', 'portrait'); // Tamaño medio oficio
	    $dompdf->render();

	    // Enviamos el PDF al navegador
	    $dompdf->stream("Recibo_Internet_" . $pago['id'] . ".pdf", ["Attachment" => false]);
	}
	//Alertas de pagos
	public function verAlertas()
	{
	    $db = \Config\Database::connect();
	    $mesActual = date('m');
	    $anioActual = date('Y');

	    // Esta consulta busca usuarios que NO tienen un registro de pago en el mes actual
	    $query = $db->query("
	        SELECT u.nombres, u.telefono1, p.nombre_plan as plan_nombre, p.precio
	        FROM usuarios u
	        JOIN planes p ON u.plan_id = p.id
	        WHERE u.estado = 'activo'
	        AND u.id NOT IN (
	            SELECT usuario_id 
	            FROM pagos 
	            WHERE mes_pagado = $mesActual AND anio_pagado = $anioActual
	        )
	    ");

	    $data['morosos'] = $query->getResultArray();
	    return view('pagos/alertas', $data);
	}
//Metodo dashboard
	public function dashboard() {
	    $db = \Config\Database::connect();
	    $mesActual = date('m');

	    $data['totalRecaudado'] = $db->table('pagos')
	                                 ->where('mes_pagado', $mesActual)
	                                 ->selectSum('monto')
	                                 ->get()->getRow()->monto ?? 0;

	    $data['totalClientes'] = $db->table('usuarios')->where('estado', 'activo')->countAllResults();
	    
	    $data['pagosRealizados'] = $db->table('pagos')
	                                  ->where('mes_pagado', $mesActual)
	                                  ->countAllResults();

	    return view('pagos/dashboard', $data);
	}
//Metodo crear pagos
	public function crear() {
	    $db = \Config\Database::connect();
	    // Traemos usuarios con el precio de su plan para el autocompletado JS
	    $data['usuarios'] = $db->table('usuarios u')
	                           ->select('u.id, u.nombres, p.nombre_plan as plan_nombre, p.precio as precio_plan')
	                           ->join('planes p', 'p.id = u.plan_id')
	                           ->where('u.estado', 'activo')
	                           ->get()->getResultArray();

	    return view('pagos/crear', $data);
	}

}

?>
