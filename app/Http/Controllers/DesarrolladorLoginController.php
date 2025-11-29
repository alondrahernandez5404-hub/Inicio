<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesarrolladorLoginController extends Controller
{
    // Tus desarrolladores "falsos"
    private array $desarrolladores = [
        [
            'nombre_completo' => 'Estefania Montenegro Brava',
            'clave'           => '35149',
            'telefono'        => '3355791011',
            'cp'              => '42125',
            'pais'            => 'Suiza',
            'password'        => '2EF25',
        ],
        [
            'nombre_completo' => 'Carolina Lopez Diaz',
            'clave'           => '83273',
            'telefono'        => '9953131250',
            'cp'              => '36531',
            'pais'            => 'España',
            'password'        => '7D28A',
        ],
        [
            'nombre_completo' => 'Nelly Lara Neri',
            'clave'           => '67210',
            'telefono'        => '7285337900',
            'cp'              => '91599',
            'pais'            => 'Irlanda',
            'password'        => 'L28S5',
        ],
    ];

    // Muestra el formulario de login
    public function mostrarFormulario()
    {
        return view('desarrollador.login');
    }

    // Procesa el POST del login
    public function validar(Request $request)
    {
        // Validación
        $datos = $request->validate([
            'nombre_completo' => 'required|string',
            'clave'           => 'required|string',
            'telefono'        => 'required|string',
            'cp'              => 'required|string',
            'pais'            => 'required|string',
            'password'        => 'required|string',
        ]);

        // Normalizamos
        $datosNorm = array_map(fn($v) => mb_strtolower(trim((string)$v)), $datos);

        // Comparamos contra la lista de desarrolladores
        foreach ($this->desarrolladores as $dev) {

            $devNorm = array_map(fn($v) => mb_strtolower(trim((string)$v)), $dev);

            if (
                $devNorm['nombre_completo'] === $datosNorm['nombre_completo'] &&
                $devNorm['clave']           === $datosNorm['clave'] &&
                $devNorm['telefono']        === $datosNorm['telefono'] &&
                $devNorm['cp']              === $datosNorm['cp'] &&
                $devNorm['pais']            === $datosNorm['pais'] &&
                $devNorm['password']        === $datosNorm['password']
            ) {

                // Guardamos sesión
                session([
                    'desarrollador_nombre' => $dev['nombre_completo']
                ]);

                return redirect()->route('desarrollador.panel');
            }
        }

        // Si no coincide → volver al inicio
        return redirect()->route('inicio');
    }

    public function panel()
    {
        return view('desarrollador.panel');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['desarrollador_nombre']);
        return redirect()->route('inicio');
    }
}
