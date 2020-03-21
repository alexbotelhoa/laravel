<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class UsuarioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $usuario, $idade)
    {
        log::debug("Passou PRIMEIRO middleware INDO, com Usuario: $usuario, $idade");
        $response = $next($request);
        log::debug('Passou PRIMEIRO middleware VOLTANDO');
        return response('Alterar a resposta!', 201);
    }
}
