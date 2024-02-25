<?php

namespace App\Services\User;

use App\Repositories\UserRepository;

class CreateUserService 
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $credentials)
    {
        $this->repository->create($credentials);
        return true;
    }

}