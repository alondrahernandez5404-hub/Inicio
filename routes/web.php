<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosPublicosController;
use App\Http\Controllers\DesarrolladorLoginController;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';

Route::post('/registro-publico', [UsuariosPublicosController::class, 'store'])->name('registro.publico');

// Login desarrollador
Route::get('/login-desarrollador', [DesarrolladorLoginController::class, 'mostrarFormulario'])
    ->name('desarrollador.login');

Route::post('/login-desarrollador', [DesarrolladorLoginController::class, 'validar'])
    ->name('desarrollador.validar');

// Panel desarrollador
Route::get('/panel-desarrollador', [DesarrolladorLoginController::class, 'panel'])
    ->name('desarrollador.panel');

// 🔥🔥 AÑADE ESTA RUTA (logout del desarrollador)
Route::post('/desarrollador/logout', [DesarrolladorLoginController::class, 'logout'])
    ->name('desarrollador.logout');

// Rutas temporales
Route::get('/seleccion-terror', function() {
    return view('seleccion-terror');
});

Route::get('/peliculas/{tipo}', function($tipo) {
    return "Aquí se mostrarán las películas de tipo: $tipo";
});
