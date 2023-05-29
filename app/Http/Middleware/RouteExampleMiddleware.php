<?php

namespace App\Http\Middleware;

use Closure;

class RouteExampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $args)
    {
        echo "Route Middleware is here with args: $args\n";
        return $next($request);
    }
}
