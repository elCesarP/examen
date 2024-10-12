<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{

    // constructor para modelos que hereden
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    // metodo para crear
    public function crear(Request $request)
    {
        $registro = $this->model->create($request->all());

        return response()->json([
            'message' => 'Registro creado con éxito',
            'data' => $registro
        ], 201);
    }

    // metodo para actualizar por id
    public function actualizarId(Request $request, $id)
    {
        $registro = $this->model->findOrFail($id);
        $registro->update($request->all());

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => $registro
        ]);
    }

    // metodo para eliminar por id
    public function eliminarId($id)
    {
        $registro = $this->model->findOrFail($id);
        $registro->delete();

        return response()->json([
            'message' => 'Registro eliminado con éxito',
            'id' => $id
        ]);
    }

    // metodo para listar todo
    public function listarTodo()
    {
        $registros = $this->model->all();
        return response()->json($registros);
    }

    // metodo para listar por id
    public function listarId($id)
    {
        $registro = $this->model->findOrFail($id);
        return response()->json($registro);
    }

    // metodo para listar por campo
    public function listarCampo($campo, $valor)
    {
        $registros = $this->model->where($campo, $valor)->get();
        return response()->json($registros);
    }
}
