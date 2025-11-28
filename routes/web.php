<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';

use App\Http\Controllers\UsuariosPublicosController;
use App\Http\Controllers\DesarrolladoresController;

Route::post('/registro-publico', [UsuariosPublicosController::class, 'store'])->name('registro.publico');
Route::post('/login-desarrollador', [DesarrolladoresController::class, 'login'])->name('login.desarrollador');

// Temporales
Route::get('/seleccion-terror', function() {
    return view('seleccion-terror');
});

Route::get('/peliculas/{tipo}', function($tipo) {
    return "Aquí se mostrarán las películas de tipo: $tipo";
});
