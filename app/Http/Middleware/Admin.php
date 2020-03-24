<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        (isset(auth()->user()->id)) ? $id = 1 : $id = 0;
        (isset(auth()->user()->admin)) ? $admin = 1 : $admin = 0;

        if($id > 0){
            if ($admin == 1) return $next($request);
                return redirect('home');
        }
        return redirect('login');
    }
}