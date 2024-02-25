<?php

namespace App\Http\Controllers\Dtos;

use App\Dto\Dto;
use Illuminate\Http\Request;

class UserCreateDto implements Dto
{
    public string $name;
    public string $email;
    public string $password;

    public function __construct($request)
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = $request->password;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
