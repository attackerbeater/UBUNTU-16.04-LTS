<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check() && Auth::user()->isRole() == 1){
            return redirect('user');
        }elseif (Auth::check() && Auth::user()->isRole() == 2) {
            return redirect('administrator');
        }
        return $next($request);
    }
}
