<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function list() {
        $tramites = Tramite::all();
        $list = [];

        foreach ($tramites as $tramite) {
            $object = [
                "id" => $tramite->id,
                "nombre" => $tramite->nombre,
                "tipo_id" => $tramite->tipo_id,
                "usuario_id" => $tramite->usuario_id,
                "fecha_inicio" => $tramite->fecha_inicio,
                "fecha_vencimiento" => $tramite->fecha_vencimiento,
                "created_at" => $tramite->created_at,
                "updated_at" => $tramite->updated_at
            ];

            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function item($id) {
        $tramite = Tramite::findOrFail($id);

        $object = [
            "id" => $tramite->id,
            "nombre" => $tramite->nombre,
            "tipo_id" => $tramite->tipo_id,
            "usuario_id" => $tramite->usuario_id,
            "fecha_inicio" => $tramite->fecha_inicio,
            "fecha_vencimiento" => $tramite->fecha_vencimiento,
            "created_at" => $tramite->created_at,
            "updated_at" => $tramite->updated_at
        ];

        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string',
            'tipo_id' => 'required|exists:tipos,id',
            'usuario_id' => 'required|exists:users,id',
            'fecha_inicio' => 'required|date',
            'fecha_vencimiento' => 'required|date'
        ]);

        $tramite = Tramite::create([
            'nombre' => $data['nombre'],
            'tipo_id' => $data['tipo_id'],
            'usuario_id' => $data['usuario_id'],
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_vencimiento' => $data['fecha_vencimiento']
        ]);

        if ($tramite) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $tramite,
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
            'tipo_id' => 'required|exists:tipos,id',
            'usuario_id' => 'required|exists:users,id',
            'fecha_inicio' => 'required|date',
            'fecha_vencimiento' => 'required|date'
        ]);

        $tramite = Tramite::findOrFail($id);

        $updated = $tramite->update([
            'nombre' => $data['nombre'],
            'tipo_id' => $data['tipo_id'],
            'usuario_id' => $data['usuario_id'],
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_vencimiento' => $data['fecha_vencimiento']
        ]);

        if ($updated) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $tramite,
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
        $tramite = Tramite::findOrFail($id);
        $deleted = $tramite->delete();

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
