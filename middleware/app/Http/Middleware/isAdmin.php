<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        // Si user est admin
        if (Auth::user()->isAdmin()) {
            // On redirige vers la page demandée
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
