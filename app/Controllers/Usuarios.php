<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ProductoModel;
use App\Models\PlanModel;

use CodeIgniter\I18n\Time;
use Dompdf\Dompdf;
use Dompdf\Options;

class Usuarios extends BaseController
{
    public function index()
    {
        $model = new UsuarioModel();
        $data['clientes'] = $model->findAll();
        return view('clientes/index', $data);
    }

    public function crear()
    {
        return view('clientes/crear');
    }

    public function guardar()
    {
        $model = new UsuarioModel();
        // Reglas de validación
        $reglas = [
            'nombres' => 'required|max_length[100]',
            'apellidos' => 'required|max_length[100]',
            'tipo_cedula' => 'required|max_length[2]',
            'cedula' => 'required|decimal',
            'correo'      => 'required|min_length[3]|max_length[100]',
            'telefono1' => 'required|decimal',
            'telefono2' => 'required|decimal',
            'fecha_nac' => 'required|max_length[100]',
            'direccion' => 'required|max_length[250]',
            'plan_id' => 'required|decimal',
            'producto_id' => 'required|decimal',
            'fecha_ins' => 'required|max_length[100]',
            'dia_pago' => 'required|decimal',
            'estado' => 'required|max_length[50]',
            'fecha_acceso' => 'max_length[100]' 
        ];

        if (!$this->validate($reglas)) {
            // Regresa al formulario con los errores y los datos escritos
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->save($this->request->getPost());
        return redirect()->to('/clientes')->with('msg', '¡Cliente creado exitosamente!');
    }
    //FUNCION EDITAR PLAN
    public function editar($id)
    {
        $model = new UsuarioModel();
        $producto = new ProductoModel();
        $data = [
                    'cliente'   => $model->find($id),
                    'productos' => $producto->findAll(), // Para llenar el select
        ];

        if (!$data['cliente']) {
            return redirect()->to('/clientes')->with('error', 'Cliente no encontrado');
        }

        return view('clientes/editar', $data);
    }

    public function actualizar($id)
    {
        $userModel = new UsuarioModel();
        $venezuelaTime = new Time('now', 'America/Caracas');
        $data = [
            'nombres'    => $this->request->getPost('nombres'),
            'apellidos'    => $this->request->getPost('apellidos'),
            'tipo_cedula' => $this->request->getPost('tipo_cedula'),
            'cedula'    => $this->request->getPost('cedula'),
            'correo' => $this->request->getPost('correo'),
            'telefono1'    => $this->request->getPost('telefono1'),
            'telefono2' => $this->request->getPost('telefono2'),
            'fecha_nac'    => $this->request->getPost('fecha_nac'),
            'direccion' => $this->request->getPost('direccion'),
            'plan_id'    => $this->request->getPost('plan_id'),
            'producto_id' => $this->request->getPost('producto_id'),
            'fecha_ins'    => $this->request->getPost('fecha_ins'),
            'dia_pago' => $this->request->getPost('dia_pago'),
            'estado' => $this->request->getPost('estado'),
            'fecha_acceso' => $venezuelaTime->format('Y-m-d H:i:s'),
        ];

        if ($userModel->update($id, $data)) {
            return redirect()->to('/clientes')->with('success', 'Actualizado correctamente');
        }

        return redirect()->back()->with('error', 'Error al actualizar');
    }

    public function eliminar($id)
    {
        $model = new UsuarioModel();
        $model->delete($id);
        return redirect()->to('/clientes')->with('msg', 'Cliente eliminado correctamente');
    }

    public function generarContrato($id) {
        $model = new UsuarioModel();
        $plan = new PlanModel();
        $data['u'] = $model->obtenerPlanUsuario($id); // Obtiene usuario por ID

        // Cargar vista HTML y pasar datos
        $html = view('contrato_view', $data);

        // Instanciar Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Descargar o visualizar
        $dompdf->stream("contrato_" . $data['u']['cedula'] . ".pdf");
    }

}
