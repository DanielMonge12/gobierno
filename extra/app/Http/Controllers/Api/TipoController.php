<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function list() {
        $tipos = Tipo::all();
        $list = [];

        foreach ($tipos as $tipo) {
            $object = [
                "id" => $tipo->id,
                "nombre" => $tipo->nombre,
                "costo" => $tipo->costo,
                "dependencia_id" => $tipo->dependencia_id,
                "estado" => $tipo->estado,
                "tipo" => $tipo->tipo,
                "created_at" => $tipo->created_at,
                "updated_at" => $tipo->updated_at
            ];

            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function item($id) {
        $tipo = Tipo::findOrFail($id);

        $object = [
            "id" => $tipo->id,
            "nombre" => $tipo->nombre,
            "costo" => $tipo->costo,
            "dependencia_id" => $tipo->dependencia_id,
            "estado" => $tipo->estado,
            "tipo" => $tipo->tipo,
            "created_at" => $tipo->created_at,
            "updated_at" => $tipo->updated_at
        ];

        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string',
            'costo' => 'required|numeric',
            'dependencia_id' => 'required|exists:dependencias,id',
            'estado' => 'required|in:activo,inactivo',
            'tipo' => 'required|string'
        ]);

        $tipo = Tipo::create([
            'nombre' => $data['nombre'],
            'costo' => $data['costo'],
            'dependencia_id' => $data['dependencia_id'],
            'estado' => $data['estado'],
            'tipo' => $data['tipo']
        ]);

        if ($tipo) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $tipo,
            ];

            return response()->json($object, 201); // 201 Created status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];

            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required|string',
            'costo' => 'required|numeric',
            'dependencia_id' => 'required|exists:dependencias,id',
            'estado' => 'required|in:activo,inactivo',
            'tipo' => 'required|string'
        ]);

        $tipo = Tipo::findOrFail($id);

        $updated = $tipo->update([
            'nombre' => $data['nombre'],
            'costo' => $data['costo'],
            'dependencia_id' => $data['dependencia_id'],
            'estado' => $data['estado'],
            'tipo' => $data['tipo']
        ]);

        if ($updated) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $tipo,
            ];

            return response()->json($object, 200); // 200 OK status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];

            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }

    public function delete($id) {
        $tipo = Tipo::findOrFail($id);
        $deleted = $tipo->delete();

        if ($deleted) {
            $object = [
                "response" => 'Success: Item deleted correctly.',
            ];

            return response()->json($object, 200); // 200 OK status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];

            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }
}
