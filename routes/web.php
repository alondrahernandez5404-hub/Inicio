<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsuariosPublicosController;
use App\Http\Controllers\DesarrolladorLoginController;

// Página principal (Blade normal)
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Dashboard de usuarios normales (Vue + Inertia)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';

// Registro público
Route::post('/registro-publico', [UsuariosPublicosController::class, 'store'])
    ->name('registro.publico');


// ==============================================
//      🔥 LOGIN Y PANEL DEL DESARROLLADOR (VUE)
// ==============================================

// Página de login del desarrollador (Vue)
Route::get('/login-desarrollador', function () {
    return Inertia::render('DevLogin');
})->middleware('web')->name('desarrollador.login');

// Validar login desarrollador
Route::post('/login-desarrollador', [DesarrolladorLoginController::class, 'validar'])
    ->middleware('web')
    ->name('desarrollador.validar');

// Panel del desarrollador (Vue)
Route::get('/panel-desarrollador', function () {
    return Inertia::render('DevPanel');
})
->middleware(['web', 'auth.desarrollador'])
->name('desarrollador.panel');

// Logout desarrollador
Route::post('/desarrollador/logout', [DesarrolladorLoginController::class, 'logout'])
    ->middleware(['web', 'auth.desarrollador'])
    ->name('desarrollador.logout');


// ==============================================
//                VISTA CRUD DE PELÍCULAS
// ==============================================

Route::get('/peliculas', function () {
    return Inertia::render('Peliculas');
})
->middleware(['web', 'auth.desarrollador'])
->name('peliculas.vista');


// ==============================================
//                RUTAS TEMPORALES
// ==============================================

Route::get('/seleccion-terror', function() {
    return view('seleccion-terror');
});
