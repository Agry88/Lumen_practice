<?php

namespace App\Http\Middleware;

use App\Models\User as UserModel;
use Closure;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
use Exception;

class AuthMiddleware
{


    public function checkToken($request) {
        $jwtToken = $request->header('jwtToken');
        $secretKey = "SECRET";
        try {
            $payload = JWT::decode($jwtToken, new Key($secretKey, 'HS256'));
            return true;
        } catch (\Throwable $e) {
            echo $e->getMessage();
            return false;
        }
    }

    private function getToken($id) {
        $secretKey = "SECRET";
        $payload = array(
            "iss" => "http://localhost",
            "aud" => "http://localhost",
            "iat" => time(),
            "exp" => time() + 600,
            "data" => array(
                "id" => $id
            )
        );
        $jwt = JWT::encode($payload, $secretKey, 'HS256');
        return $jwt;
    }

    public function handle($request, Closure $next)
    {
        $userModel = new UserModel;
        switch ($request->path()) {
            case 'doLogin':
                $user_id = $request->input('user_id');
                $user = $userModel->showUser($user_id);
                $token = $this->getToken($user_id);
                return response($token,200);
                break;

            case 'register':
                echo "執行註冊動作";
                break;
            
            default:
                if($this->checkToken($request)) {
                    return $next($request);
                } else {
                    return response("無效Token", 401);
                }
                break;
        }
    }
}
