<?php

namespace App\Services\Auth;

use Exception;

class LoginService 
{

    public function execute(array $credentials)
    {
        if(!$token = auth()->setTTL(3*60)->attempt($credentials))
        {
            throw new Exception('Not authorized', 401);
        }

        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL(),
            'user' => auth()->user()
        ];
    }

}