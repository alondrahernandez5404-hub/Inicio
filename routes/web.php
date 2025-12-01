<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsuariosPublicosController;
use App\Http\Controllers\DesarrolladorLoginController;
use App\Http\Controllers\UsuarioController; // <-- AGREGADO

// ==============================================
//          PÁGINA PRINCIPAL (Vue + Inertia)
// ==============================================
Route::get('/', function () {
    return Inertia::render('Home');
})->name('inicio');

// ==============================================
//       DASHBOARD USUARIOS NORMALES (Vue + Inertia)
// ==============================================
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==============================================
//             REGISTRO DE USUARIOS
// ==============================================
Route::post('/registro-publico', [UsuariosPublicosController::class, 'store'])
    ->name('registro.publico');

// ==============================================
//      LOGIN Y PANEL DEL DESARROLLADOR (Vue + Inertia)
// ==============================================

// Página de login del desarrollador
Route::get('/login-desarrollador', function () {
    return Inertia::render('DevLogin');
})->name('desarrollador.login');

// Validar login desarrollador
Route::post('/login-desarrollador', [DesarrolladorLoginController::class, 'validar'])
    ->name('desarrollador.validar');

// Panel del desarrollador
Route::get('/panel-desarrollador', function () {
    return Inertia::render('DevPanel');
})
->middleware(['auth.desarrollador'])
->name('desarrollador.panel');

// Logout desarrollador
Route::post('/desarrollador/logout', [DesarrolladorLoginController::class, 'logout'])
    ->middleware(['auth.desarrollador'])
    ->name('desarrollador.logout');

// ==============================================
//                CRUD DE PELÍCULAS
// ==============================================
Route::get('/peliculas', function () {
    return Inertia::render('Peliculas');
})
->middleware(['auth.desarrollador'])
->name('peliculas.vista');

// ==============================================
//      PELÍCULAS VISIBLES PARA LOS USUARIOS
// ==============================================

Route::get('/peliculas-usuario', [UsuarioController::class, 'verPeliculas'])
    ->name('peliculas.usuario');
