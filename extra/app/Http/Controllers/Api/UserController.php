<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function item($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string',
            'ciudad' => 'required|string',
            'curp' => 'required|string',
        ]);

        $user = User::create($data);

        if ($user) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $user,
            ];

            return response()->json($object, 201); // 201 Created status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];

            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string',
            'ciudad' => 'required|string',
            'curp' => 'required|string',
        ]);

        $user = User::findOrFail($id);

        $updated = $user->update($data);

        if ($updated) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $user,
            ];

            return response()->json($object, 200); // 200 OK status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];

            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $deleted = $user->delete();

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
