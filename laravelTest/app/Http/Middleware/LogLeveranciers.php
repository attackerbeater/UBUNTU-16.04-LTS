<?php

namespace App\Http\Middleware;

use Closure;

class LogLeveranciers
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
        \Log::info($request->route('leveranciers')->id);  
        return $next($request);
    }
}
