<?php

namespace App\Controllers;

use App\Models\PlanModel;

class Planes extends BaseController
{
    public function index()
    {
        $model = new PlanModel();
        $data['planes'] = $model->findAll();
        return view('planes/index', $data);
    }

    public function crear()
    {
        return view('planes/crear');
    }

    public function guardar()
    {
        $model = new PlanModel();

        // Reglas de validación
        $reglas = [
            'nombre_plan'      => 'required|min_length[3]|max_length[50]',
            'descripcion_plan' => 'required|max_length[250]',
            'velocidad_subida' => 'required|max_length[10]',
            'velocidad_bajada' => 'required|max_length[10]',
            'precio'           => 'required|decimal'
        ];

        if (!$this->validate($reglas)) {
            // Regresa al formulario con los errores y los datos escritos
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->save($this->request->getPost());
        return redirect()->to('/planes')->with('msg', '¡Plan creado exitosamente!');
    }
    //FUNCION EDITAR PLAN
    public function editar($id)
    {
        $model = new PlanModel();
        $data['plan'] = $model->find($id);

        if (!$data['plan']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("El plan con ID $id no existe.");
        }

            return view('planes/editar', $data);
    }

    public function actualizar($id)
    {
        $model = new PlanModel();

        // Usamos las mismas reglas de validación que en guardar
        if (!$this->validate($model->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, $this->request->getPost());
        return redirect()->to('/planes')->with('msg', 'Plan actualizado con éxito');
    }

    public function eliminar($id)
    {
        $model = new PlanModel();
        $model->delete($id);
        return redirect()->to('/planes')->with('msg', 'Plan eliminado correctamente');
    }

}
