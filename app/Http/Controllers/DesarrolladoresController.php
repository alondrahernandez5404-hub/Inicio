<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desarrollador;

class DesarrolladoresController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'clave' => 'required|string',
            'telefono' => 'required|string',
            'cp' => 'required|string',
            'pais' => 'required|string',
            'password' => 'required|string',
        ]);

        // Solo 3 desarrolladores permitidos (lo configuramos con su clave)
        $desarrollador = Desarrollador::where('clave', $request->clave)->first();

        if (!$desarrollador) {
            return back()->withErrors(['clave' => 'Clave de desarrollador incorrecta']);
        }

        // Aquí puedes hacer login real si quieres
        return redirect('/panel-desarrollador')->with('success', 'Bienvenido, desarrollador!');
    }
}
