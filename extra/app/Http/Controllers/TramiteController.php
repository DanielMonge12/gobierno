<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramite;
use App\Models\Tipo;
use App\Models\User;

class TramiteController extends Controller
{
    public function index()
    {
        $tramites = Tramite::all();
        return view('tramites.index', compact('tramites'));
    }

    public function TramitesCrear(Request $request)
    {
        $tipos = Tipo::all();
        $usuarios = User::all();

        return view('tramites.create', compact('tipos', 'usuarios'));
    }

    public function TramitesCreate(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'tipo_id' => 'required|integer',
                'usuario_id' => 'required|integer',
                'fecha_inicio' => 'required|date',
                'fecha_vencimiento' => 'required|date',
            ]);

            Tramite::create([
                'nombre' => $request->input('nombre'),
                'tipo_id' => $request->input('tipo_id'),
                'usuario_id' => $request->input('usuario_id'),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_vencimiento' => $request->input('fecha_vencimiento'),
            ]);

            return redirect()->route('tramites.index');
        } catch (\Exception $e) {
            // Mostrar el mensaje de error o registrar el error según sea necesario
            dd($e->getMessage());
        }
    }

    public function TramitesEditar($id)
    {
        $tramite = Tramite::findOrFail($id);
        $tipos = Tipo::all();
        $usuarios = User::all();
        
        return view('tramites.edit', compact('tramite', 'tipos', 'usuarios'));
    }

    public function TramitesEdit(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'tipo_id' => 'required|integer',
                'usuario_id' => 'required|integer',
                'fecha_inicio' => 'required|date',
                'fecha_vencimiento' => 'required|date',
            ]);

            $tramite = Tramite::findOrFail($id);
            $tramite->update([
                'nombre' => $request->input('nombre'),
                'tipo_id' => $request->input('tipo_id'),
                'usuario_id' => $request->input('usuario_id'),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_vencimiento' => $request->input('fecha_vencimiento'),
            ]);

            return redirect()->route('tramites.index');
        } catch (\Exception $e) {
            // Mostrar el mensaje de error o registrar el error según sea necesario
            dd($e->getMessage());
        }
    }

    public function TramitesDelete($id)
    {
        $tramite = Tramite::findOrFail($id);
        $tramite->delete();

        return redirect()->route('tramites.index');
    }
}
