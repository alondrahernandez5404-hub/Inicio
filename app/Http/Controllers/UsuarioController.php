<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Pelicula;

class UsuarioController extends Controller
{
    // Mostrar todas las películas al usuario
    public function verPeliculas()
    {
        $peliculas = Pelicula::all(); // Trae todas las películas

        return Inertia::render('PeliculasUsuario', [
            'peliculas' => $peliculas,
        ]);
    }
}
