<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    private $model;

    public function __construct(User $model){
        $this->model = $model;
    }

    public function create($date)
    {
        return $this->model->create([
            'name' => $date['name'],
            'email' => $date['email'],
            'password' => $date['password'],
        ]);
    }

    public function update($date)
    {
        $tmp = [
            'name' => $date['name'],
            'email' => $date['email'],
        ];

        if(isset($date['password']) && $date['password'])
        {
            $tmp['password'] = $date['password'];
        }

        return $this->model->where('id', $date['id'])
        ->update($tmp);
    }
}
