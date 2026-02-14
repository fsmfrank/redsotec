<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\PlanModel;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nombres',
        'apellidos',
        'tipo_cedula',
        'cedula',
        'correo',
        'telefono1',
        'telefono2',
        'fecha_nac',
        'direccion',
        'plan_id',
        'producto_id',
        'fecha_ins',
        'dia_pago',
        'estado',
        'fecha_acceso',
    ];

    // Opcional: Validación automática
    protected $validationRules = [
        'nombres'      => 'required|max_length[100]',
        'apellidos' => 'required|max_length[100]',
        'cedula'           => 'required|decimal'
    ];
    public function obtenerPlanUsuario($id) {
        return $this->select('usuarios.*, planes.*, productos.*')
                    ->join('planes', 'planes.id = usuarios.plan_id')
                    ->join('productos', 'productos.id = usuarios.producto_id')
                    ->where('usuarios.id', $id)
                    ->first(); 
    }
    public function getPlan()
    {
        $planModel = new PlanModel();
        return $planModel->find($this->attributes['plan_id']);
    }
}

?>