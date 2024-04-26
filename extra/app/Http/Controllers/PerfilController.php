<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PerfilController extends Controller
{   
   public function index(){
        return view('perfil');
   }
    public function PerfilEditar($id)
    {
         $users = User::findOrFail($id);
            return view('edit', compact('users'));
    }
    public function ProfileEdit(Request $request, $id){

        $request->validate([
            'name' => 'required|string',
            'telefono' => 'required|integer',
            'email' => 'required|email',
            'ciudad' => 'required|string',
            'curp' => 'required|string',
        ]);

        $users = User::findOrFail($id);
        $users->name = $request->input('name');
        $users->telefono = $request->input('telefono');
        $users->email = $request->input('email');
        $users->ciudad = $request->input('ciudad');
        $users->curp = $request->input('curp');
        $users->save();

        return redirect()->route('perfil');
    }
    public function ProfileDelete($id){
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('perfil');
    }
}