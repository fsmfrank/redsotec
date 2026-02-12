<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    public function index()
    {
        $model = new ProductoModel();
        $data['productos'] = $model->findAll();
        return view('productos/index', $data);
    }

    public function crear()
    {
        return view('productos/crear');
    }

    public function guardar()
    {
        $model = new ProductoModel();

        // Reglas de validación
        $reglas = [
            'marca_producto' => 'required|max_length[50]',
            'modelo_producto' => 'required|max_length[50]',
            'ip_producto' => 'required|max_length[50]',
            'mac_producto' => 'required|max_length[50]',
            'foto_producto'      => 'required|min_length[3]|max_length[250]',
            'es_inventario' => 'required|max_length[2]',
            'precio'           => 'required|decimal'
        ];

        if (!$this->validate($reglas)) {
            // Regresa al formulario con los errores y los datos escritos
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->save($this->request->getPost());
        return redirect()->to('/productos')->with('msg', '¡Producto creado exitosamente!');
    }
    //FUNCION EDITAR PLAN
    public function editar($id)
    {
        $model = new ProductoModel();
        $data['producto'] = $model->find($id);

        if (!$data['producto']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("El producto con ID $id no existe.");
        }

            return view('productos/editar', $data);
    }

    public function actualizar($id)
    {
        $model = new ProductoModel();
        // Reglas de validación
        $reglas = [
            'marca_producto' => 'required|max_length[50]',
            'modelo_producto' => 'required|max_length[50]',
            'ip_producto' => 'required|max_length[50]',
            'mac_producto' => 'required|max_length[50]',
            'foto_producto'      => 'required|min_length[3]|max_length[250]',
            'es_inventario' => 'required|max_length[2]',
            'precio'           => 'required|decimal'
        ];

        if (!$this->validate($reglas)) {
            // Regresa al formulario con los errores y los datos escritos
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, $this->request->getPost());
        return redirect()->to('productos')->with('msg', 'Producto actualizado con éxito');
    }

    public function eliminar($id)
    {
        $model = new ProductoModel();
        $model->delete($id);
        return redirect()->to('/productos')->with('msg', 'Producto eliminado correctamente');
    }

}
