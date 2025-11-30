<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthDesarrollador
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si NO está logueado como desarrollador → redirigir
        if (!session()->has('desarrollador_id')) {
            return redirect()->route('desarrollador.login');
        }

        return $next($request);
    }
}
