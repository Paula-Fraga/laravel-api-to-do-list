<?php

namespace App\Services\User;

use App\Repositories\UserRepository;

class CreateUserService 
{

    public function __construct(protected UserRepository $repository){}
 
    public function execute(array $credentials)
    {
        $this->repository->create($credentials);
        return true;
    }

}