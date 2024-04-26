<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function UserCrear()
    {
        return view('users.create');
    }

    public function UserCreate(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'telefono' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'ciudad' => 'required|string',
                'curp' => 'required|string',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'telefono' => $request->input('telefono'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'ciudad' => $request->input('ciudad'),
                'curp' => $request->input('curp'),
            ]);

            return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function UserEditar($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function UserEdit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string',
            'ciudad' => 'required|string',
            'curp' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->telefono = $request->input('telefono');
        $user->email = $request->input('email');
        $user->ciudad = $request->input('ciudad');
        $user->curp = $request->input('curp');
        $user->save();

        return redirect()->route('users.index');
    }

    public function UserDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
