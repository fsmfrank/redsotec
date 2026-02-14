<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tablas extends Migration
{
    public function up()
    {
        //TABLA PLANES
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'nombre_plan' => ['type' => 'VARCHAR', 'constraint' => 50],
            'descripcion_plan' => ['type' => 'VARCHAR', 'constraint' => 250],
            'velocidad_subida' => ['type' => 'VARCHAR', 'constraint' => 10], // e.g. 5M
            'velocidad_bajada' => ['type' => 'VARCHAR', 'constraint' => 10], // e.g. 10M
            'precio' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('planes');
        //TABLA PRODUCTOS
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'marca_producto' => ['type' => 'VARCHAR', 'constraint' => 50],
            'modelo_producto' => ['type' => 'VARCHAR', 'constraint' => 50],
            'ip_producto' => ['type' => 'VARCHAR', 'constraint' => 30],
            'mac_producto' => ['type' => 'VARCHAR', 'constraint' => 30],
            'foto_producto' => ['type' => 'VARCHAR', 'constraint' => 100],
            'es_inventario' => ['type' => 'ENUM', 'constraint' => ['si', 'no'], 'default' => 'no'],
            'precio' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('productos');
        //TABLA USUARIOS
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'nombres' => ['type' => 'VARCHAR', 'constraint' => 100],
            'apellidos' => ['type' => 'VARCHAR', 'constraint' => 100],
            'tipo_cedula' => ['type' => 'ENUM', 'constraint' => ['v', 'e','j','g','c','o'], 'default' => 'v'],
            'cedula' => ['type' => 'INT', 'constraint' => 20],
            'correo' => ['type' => 'VARCHAR', 'constraint' => 100],
            'telefono1' => ['type' => 'INT'],
            'telefono2' => ['type' => 'INT'],
            'fecha_nac' => ['type' => 'DATE', 'null' => true],
            'direccion' => ['type' => 'TEXT', 'constraint' => 250],
            'plan_id' => ['type' => 'INT'],
            'producto_id' => ['type' => 'INT'],
            'fecha_ins' => ['type' => 'DATE', 'null' => true],
            'dia_pago'          => ['type' => 'INT', 'constraint' => 2, 'default' => 5],
            'estado' => ['type' => 'ENUM', 'constraint' => ['activo', 'suspendido'], 'default' => 'activo'],
            'fecha_acceso' => ['type' => 'DATE', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('plan_id', 'planes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('producto_id', 'productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('usuarios');

        //TABLA PAGOS
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'usuario_id' => ['type' => 'INT'],
            'monto' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'mes_pagado' => ['type' => 'DATE', 'null' => true],
            'anio_pagado' => ['type' => 'VARCHAR', 'constraint' => 30],
            'fecha_pago' => ['type' => 'DATE', 'null' => true],
            'metodo_pago' => ['type' => 'ENUM', 'constraint' => ['efectivo', 'pago_movil','transferencia', 'otro'], 'default' => 'efectivo'],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pagos');        
    }

    public function down()
    {
        //
    }
}
