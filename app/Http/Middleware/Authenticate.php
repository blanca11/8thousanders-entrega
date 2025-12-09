<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;


class Authenticate extends Middleware
{
    /**
     * Obtiene la ruta a la que debe redirigirse si no está autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request)
    {
        // Si la petición no espera JSON, redirige a login
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
