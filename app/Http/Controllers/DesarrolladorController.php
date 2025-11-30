<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DesarrolladorController extends Controller
{
    public function login(Request $request)
    {
        $credenciales = $request->only(['nombre_completo','clave','telefono','cp','pais','password']);

        $usuariosFalsos = [
            [
                'nombre_completo' => 'Dev 1',
                'clave' => '1234',
                'telefono' => '5551112222',
                'cp' => '12345',
                'pais' => 'México',
                'password' => 'pass1'
            ],
            [
                'nombre_completo' => 'Dev 2',
                'clave' => '5678',
                'telefono' => '5553334444',
                'cp' => '54321',
                'pais' => 'España',
                'password' => 'pass2'
            ],
            [
                'nombre_completo' => 'Dev 3',
                'clave' => '9999',
                'telefono' => '5556667777',
                'cp' => '67890',
                'pais' => 'Argentina',
                'password' => 'pass3'
            ]
        ];

        foreach ($usuariosFalsos as $user) {
            if ($credenciales == $user) {
                return redirect('/desarrollador'); // Página de agregar películas
            }
        }

        // Si no coincide → enviar error a Inertia
        return back()->withErrors(['login' => 'Datos incorrectos']);
    }
}
