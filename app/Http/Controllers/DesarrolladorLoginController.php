<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class DesarrolladorLoginController extends Controller
{
    // Validar login (cualquiera puede entrar)
    public function validar(Request $request)
    {
        // Guardamos en sesión sin validar nada
        Session::put('desarrollador', [
            'acceso' => true,
            'nombre' => $request->clave ?? 'Desarrollador'
        ]);

        // Respuesta para Inertia + useForm
        return response()->json([
            'success' => true,
            'redirect' => route('desarrollador.panel')
        ]);
    }

    // Panel del desarrollador
    public function panel()
    {
        if (!Session::has('desarrollador')) {
            return Inertia::location(route('desarrollador.login'));
        }

        $nombre = Session::get('desarrollador.nombre', 'Desarrollador');

        return Inertia::render('DevPanel', [
            'nombre' => $nombre
        ]);
    }

    // Logout
    public function logout()
    {
        Session::forget('desarrollador');
        return Inertia::location(route('desarrollador.login'));
    }
}
