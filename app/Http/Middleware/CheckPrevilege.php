<?php

namespace App\Http\Middleware;

use Closure;

class CheckPrevilege
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
        $role = $request->header('role');
        $isAuthorized = ($role == "admin");
        if($isAuthorized) {
            return $next($request);
        } else {
            return response("權限不足", 401);
        }
    }
}
