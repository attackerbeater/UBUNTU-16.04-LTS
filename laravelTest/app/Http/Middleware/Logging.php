<?php

namespace App\Http\Middleware;

use Closure;

class Logging
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
        \Log::info(
            $request->fullUrl(),
            [
                'method' => $request->method(),
                'input'  => $request->all(),  
            ]       
        );

        return $next($request);
    }
}
