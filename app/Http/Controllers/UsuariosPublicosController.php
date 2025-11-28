<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioPublico;

class UsuariosPublicosController extends Controller
{
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'correo' => 'required|email|regex:/@gmail\.com$/',
        ], [
            'correo.regex' => 'El correo debe terminar en @gmail.com',
        ]);

        // Guardar usuario en DB
        UsuarioPublico::create([
            'nombre' => $request->nombre,
            'pais' => $request->pais,
            'correo' => $request->correo,
        ]);

        // Redirigir a página de selección de terror (la haremos después)
        return redirect('/seleccion-terror')->with('success', '¡Bienvenido, pequeño psicópata!');
    }
}
