<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dependencia;

class DependenciaController extends Controller
{
    public function index()
    {
        // Obtener las dependencias del usuario autenticado
        $dependencias = auth()->user()->dependencias;

        return view('dependencias.index', compact('dependencias'));
    }

    public function DependenciasCrear(Request $request)
    {
        return view('dependencias.create');
    }

    public function DependenciasCreate(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'correo' => 'required|email',
                'telefono' => 'required|string',
                'dependencia' => 'required|string',
                'estado' => 'required|in:activo,inactivo',
            ]);

            // Obtener el usuario autenticado
            $user = Auth::user();

            // Crear la dependencia asociada al usuario
            $dependencia = new Dependencia([
                'nombre' => $request->input('nombre'),
                'correo' => $request->input('correo'),
                'telefono' => $request->input('telefono'),
                'dependencia' => $request->input('dependencia'),
                'estado' => $request->input('estado'),
                'user_id' => $user->id, // Asignar el user_id del usuario autenticado
            ]);

            // Guardar la dependencia asociada al usuario
            $dependencia->save();

            return redirect()->route('dependencias.index');
        } catch (\Exception $e) {
            // Mostrar el mensaje de error o registrar el error según sea necesario
            dd($e->getMessage());
        }
    }

    public function DependenciasEditar($id)
    {
        $dependencia = Dependencia::findOrFail($id);
        return view('dependencias.edit', compact('dependencia'));
    }

    public function DependenciasEdit(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'correo' => 'required|email',
                'telefono' => 'required|string',
                'dependencia' => 'required|string',
                'estado' => 'required|in:activo,inactivo',
            ]);

            $dependencia = Dependencia::findOrFail($id);
            $dependencia->update([
                'nombre' => $request->input('nombre'),
                'correo' => $request->input('correo'),
                'telefono' => $request->input('telefono'),
                'dependencia' => $request->input('dependencia'),
                'estado' => $request->input('estado'),
                'user_id' => Auth::id(), // Actualizar el user_id al editar la dependencia
            ]);

            return redirect()->route('dependencias.index');
        } catch (\Exception $e) {
            // Mostrar el mensaje de error o registrar el error según sea necesario
            dd($e->getMessage());
        }
    }

    public function Detalles($id)
    {
        $dependencia = Dependencia::findOrFail($id);
        return view('dependencias.detalles', compact('dependencia'));
    }

    public function DependenciasDelete($id)
    {
        $dependencia = Dependencia::findOrFail($id);
        $dependencia->delete();

        return redirect()->route('dependencias.index');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
