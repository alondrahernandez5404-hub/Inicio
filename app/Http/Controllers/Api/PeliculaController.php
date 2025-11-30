<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        return Pelicula::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'tipo' => 'required',
        ]);

        return Pelicula::create($request->all());
    }

    public function show($id)
    {
        return Pelicula::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update($request->all());

        return $pelicula;
    }

    public function destroy($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();

        return response()->json(['message' => 'Película eliminada']);
    }
}
