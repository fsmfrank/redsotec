<?php
namespace App\Models;
use CodeIgniter\Model;

class PagoModel extends Model {
    protected $table = 'pagos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'monto', 'mes_pagado', 'anio_pagado', 'fecha_pago', 'metodo_pago'];

    // Obtener historial con nombres de usuarios
    public function getPagosConUsuarios() {
        return $this->select('pagos.*, usuarios.nombres as cliente')
                    ->join('usuarios', 'usuarios.id = pagos.usuario_id')
                    ->findAll();
    }
}

?>