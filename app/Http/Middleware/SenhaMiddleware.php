<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class SenhaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $senha)
    {
        log::debug("Passou SEGUNDO middleware INDO, com Senha: $senha");
        $response = $next($request);
        log::debug('Passou SEGUNDO middleware VOLTANDO');
        return $response;
    }
}
