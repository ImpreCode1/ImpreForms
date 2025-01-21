<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol == 'admin') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Acceso denegado. No tienes permisos de administrador.');
    }
}
