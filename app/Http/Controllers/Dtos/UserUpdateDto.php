<?php

namespace App\Http\Controllers\Dtos;

use App\Dto\Dto;
use Illuminate\Http\Request;

class UserUpdateDto implements Dto
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;

    public function __construct($request, $id)
    {
        $this->id = $id;
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = isset($request->password) ? $request->password : "";
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
