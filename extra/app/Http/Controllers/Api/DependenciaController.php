<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    public function list() {
        $dependencias = Dependencia::all();
        $list = [];

        foreach ($dependencias as $dependencia) {
            $object = [
                "id" => $dependencia->id,
                "nombre" => $dependencia->nombre,
                "correo" => $dependencia->correo,
                "telefono" => $dependencia->telefono,
                "dependencia" => $dependencia->dependencia,
                "estado" => $dependencia->estado,
                "created_at" => $dependencia->created_at,
                "updated_at" => $dependencia->updated_at
            ];

            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function item($id) {
        $dependencia = Dependencia::findOrFail($id);

        $object = [
            "id" => $dependencia->id,
            "nombre" => $dependencia->nombre,
            "correo" => $dependencia->correo,
            "telefono" => $dependencia->telefono,
            "dependencia" => $dependencia->dependencia,
            "estado" => $dependencia->estado,
            "created_at" => $dependencia->created_at,
            "updated_at" => $dependencia->updated_at
        ];

        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string',
            'correo' => 'nullable|string',
            'telefono' => 'nullable|string',
            'dependencia' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo'
        ]);

        $dependencia = Dependencia::create([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'telefono' => $data['telefono'],
            'dependencia' => $data['dependencia'],
            'estado' => $data['estado']
        ]);

        if ($dependencia) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $dependencia,
            ];

            return response()->json($object, 201); // 201 Created status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];

            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }

    public function update(Request $request) {
        $data = $request->validate([
            'id' => 'required|integer', // Asegúrate de validar que el ID sea un número entero
            'nombre' => 'required|string',
            'correo' => 'nullable|string',
            'telefono' => 'nullable|string',
            'dependencia' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo'
        ]);
    
        $dependencia = Dependencia::findOrFail($data['id']);
    
        $updated = $dependencia->update([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'telefono' => $data['telefono'],
            'dependencia' => $data['dependencia'],
            'estado' => $data['estado']
        ]);
    
        if ($updated) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $dependencia,
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
        $dependencia = Dependencia::findOrFail($id);
        $deleted = $dependencia->delete();

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
