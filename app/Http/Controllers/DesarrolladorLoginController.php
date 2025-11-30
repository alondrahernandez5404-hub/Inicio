<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class DesarrolladorLoginController extends Controller
{
    // Mostrar formulario de login (aunque ahora lo carga Vue, igual lo dejamos por claridad)
    public function mostrarFormulario()
    {
        return Inertia::render('DevLogin');
    }

    // Validar login del desarrollador
    public function validar(Request $request)
    {
        $request->validate([
            'clave' => 'required',
            'password' => 'required',
        ]);

        // Credenciales HARDCODEADAS — cámbialas si quieres
        $devClave = 'dev123';
        $devPass = '12345';

        if ($request->clave !== $devClave || $request->password !== $devPass) {
            return back()->withErrors([
                'clave' => 'Credenciales incorrectas',
            ]);
        }

        // Guardamos sesión especial del desarrollador
        Session::put('desarrollador', [
            'nombre' => 'Desarrollador',
            'clave' => $request->clave
        ]);

        return redirect()->route('desarrollador.panel');
    }

    // Panel del desarrollador (ahora lo maneja Vue)
    public function panel()
    {
        // Verificar sesión
        if (!Session::has('desarrollador')) {
            return redirect()->route('desarrollador.login');
        }

        $nombre = Session::get('desarrollador.nombre');

        return Inertia::render('DevPanel', [
            'nombre' => $nombre,
        ]);
    }

    // Logout desarrollador
    public function logout()
    {
        Session::forget('desarrollador');

        return redirect()->route('desarrollador.login');
    }
}
