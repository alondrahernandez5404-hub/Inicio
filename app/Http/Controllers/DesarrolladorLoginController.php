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
        $datos = $request->validate([
            'nombre' => 'required|string',
            'clave' => 'required|string',
            'telefono' => 'required|string',
            'cp' => 'required|string',
            'pais' => 'required|string',
            'password' => 'required|string',
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
                return redirect()->route('desarrollador.panel');
            }
        }

        return redirect('/');
    }

    public function panel()
    {
        return view('desarrollador.panel');
    }
}
