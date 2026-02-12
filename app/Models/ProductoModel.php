<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table            = 'productos';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'marca_producto',
        'modelo_producto',
        'ip_producto',
        'mac_producto',
        'foto_producto',
        'es_inventario',
        'precio'
    ];

    // Opcional: Validación automática
    protected $validationRules = [
        'marca_producto'      => 'required|max_length[50]',
        'modelo_producto' => 'required|max_length[50]',
        'precio'           => 'required|decimal'
    ];
}