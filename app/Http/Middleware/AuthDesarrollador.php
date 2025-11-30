<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthDesarrollador
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('desarrollador')) {
            return redirect()->route('desarrollador.login');
        }

        return $next($request);
    }
}
