<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesarrolladorLoginController extends Controller
{
    private $desarrolladores = [
        [
            'nombre' => 'Estefania Montenegro Brava',
            'clave' => '35149',
            'telefono' => '3355791011',
            'cp' => '42125',
            'pais' => 'Suiza',
            'password' => '2EF25'
        ],
        [
            'nombre' => 'Carolina Lopez Diaz',
            'clave' => '83273',
            'telefono' => '9953131250',
            'cp' => '36531',
            'pais' => 'España',
            'password' => '7D28A'
        ],
        [
            'nombre' => 'Nelly Lara Neri',
            'clave' => '67210',
            'telefono' => '7285337900',
            'cp' => '91599',
            'pais' => 'Irlanda',
            'password' => 'L28S5'
        ],
    ];

    public function mostrarFormulario()
    {
        return view('desarrollador.login');
    }

    public function validar(Request $request)
    {
        $datos = $request->only([
            'nombre', 'clave', 'telefono', 'cp', 'pais', 'password'
        ]);

        foreach ($this->desarrolladores as $dev) {
            if (
                $dev['nombre'] === $datos['nombre'] &&
                $dev['clave'] === $datos['clave'] &&
                $dev['telefono'] === $datos['telefono'] &&
                $dev['cp'] === $datos['cp'] &&
                $dev['pais'] === $datos['pais'] &&
                $dev['password'] === $datos['password']
            ) {
                // Si coincide → redirige al panel de desarrollador
                return redirect()->route('desarrollador.panel');
            }
        }

        // Si no coincide → redirige a la página principal
        return redirect('/');
    }

    // Panel de desarrollador donde agregará películas
    public function panel()
    {
        return view('desarrollador.panel');
    }
}
