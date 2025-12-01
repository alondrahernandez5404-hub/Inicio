<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    public function verPeliculas()
    {
        $peliculas = Pelicula::all()->map(function ($p) {
            return [
                'id' => $p->id,
                'titulo' => $p->titulo,
                'tipo' => $p->tipo,
                'clasificacion' => $p->clasificacion,
                'pais' => $p->pais,
                'duracion' => $p->duracion,
                'actores' => $p->actores,
                'nominaciones' => $p->nominaciones,
                'plataforma' => $p->plataforma,
                'descripcion' => $p->descripcion ?? 'Sin descripción',
                'imagen' => $p->imagen,
            ];
        });

        return Inertia::render('PeliculasUsuario', [
            'peliculas' => $peliculas
        ]);
    }
}
