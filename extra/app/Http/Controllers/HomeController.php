<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencia; // Importa el modelo Dependencia

class HomeController extends Controller
{
    /**
     * Crea una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Muestra el dashboard de la aplicación.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main');
    }

    /**
     * Muestra las dependencias en la página de inicio.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing()
    {
        $dependencias = Dependencia::all();
    
        return view('main', compact('dependencias'));
    }
    
    
    
}
