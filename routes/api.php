<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PeliculaController;

// Rutas API CRUD para Películas
Route::apiResource('peliculas', PeliculaController::class);
