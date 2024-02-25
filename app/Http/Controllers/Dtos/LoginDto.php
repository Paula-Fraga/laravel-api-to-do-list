<?php

namespace App\Http\Controllers\Dtos;

use App\Dto\Dto;
use Illuminate\Http\Request;

class LoginDto implements Dto
{
    public string $email;
    public string $password;

    public function __construct($request)
    {
        $this->email = $request->email;
        $this->password = $request->password;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
