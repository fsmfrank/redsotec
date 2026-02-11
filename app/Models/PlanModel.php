<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanModel extends Model
{
    protected $table            = 'planes';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nombre_plan',
        'descripcion_plan',
        'velocidad_subida',
        'velocidad_bajada',
        'precio'
    ];

    // Opcional: Validación automática
    protected $validationRules = [
        'nombre_plan'      => 'required|max_length[50]',
        'descripcion_plan' => 'required|max_length[250]',
        'precio'           => 'required|decimal'
    ];
}