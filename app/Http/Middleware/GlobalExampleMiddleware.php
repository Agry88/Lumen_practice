<?php

namespace App\Http\Middleware;

use Closure;

class GlobalExampleMiddleware
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
        echo "Global Middleware is here\n";
        return $next($request);
    }
}
