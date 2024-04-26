<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Dependencia;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }

    public function TiposCrear(Request $request)
    {
        $dependencias = Dependencia::all();
        
        return view('tipos.create', compact('dependencias'));
    }

    public function TiposCreate(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'costo' => 'required|numeric',
                'dependencia_id' => 'required|integer',
                'estado' => 'required|in:activo,inactivo',
                'tipo' => 'required|string',
            ]);

            Tipo::create([
                'nombre' => $request->input('nombre'),
                'costo' => $request->input('costo'),
                'dependencia_id' => $request->input('dependencia_id'),
                'estado' => $request->input('estado'),
                'tipo' => $request->input('tipo'),
            ]);

            return redirect()->route('tipos.index');
        } catch (\Exception $e) {
            // Mostrar el mensaje de error o registrar el error según sea necesario
            dd($e->getMessage());
        }
    }

    public function TiposEditar($id)
    {
        $tipo = Tipo::findOrFail($id);
        $dependencias = Dependencia::all(); // Obtén todas las dependencias

        return view('tipos.edit', compact('tipo', 'dependencias'));
    }

    public function TiposEdit(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'costo' => 'required|numeric',
                'dependencia_id' => 'required|integer',
                'estado' => 'required|in:activo,inactivo',
                'tipo' => 'required|string',
            ]);

            $tipo = Tipo::findOrFail($id);
            $tipo->update([
                'nombre' => $request->input('nombre'),
                'costo' => $request->input('costo'),
                'dependencia_id' => $request->input('dependencia_id'),
                'estado' => $request->input('estado'),
                'tipo' => $request->input('tipo'),
            ]);

            return redirect()->route('tipos.index');
        } catch (\Exception $e) {
            // Mostrar el mensaje de error o registrar el error según sea necesario
            dd($e->getMessage());
        }
    }

    public function TiposDelete($id)
    {
        $tipo = Tipo::findOrFail($id);
        $tipo->delete();

        return redirect()->route('tipos.index');
    }
}
