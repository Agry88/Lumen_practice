<?php

namespace App\Http\Middleware;

use App\Models\User as UserModel;
use Closure;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class EnsureRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     public function getTokenUserId($request) {
        $jwtToken = $request->header('jwtToken');
        $secretKey = "SECRET";
        try {
            $payload = JWT::decode($jwtToken, new Key($secretKey, 'HS256'));
            return $payload->data->id;
        } catch (\Throwable $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function handle($request, Closure $next, ...$roles)
    {   
        $user_id = $this->getTokenUserId($request);
        $user_model = new UserModel;
        $role_names_object = $user_model->getUserRoles($user_id);
        $role_names = [];
        foreach ($role_names_object as $role_name_object) {
            array_push($role_names, $role_name_object->name);
        }
        
        $r = array_intersect($role_names, $roles);
        if (count($r) == 0) {
            return response("權限不足", 403);
        }

        return $next($request);
   }

   


}
