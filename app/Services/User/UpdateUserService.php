<?php

namespace App\Services\User;

use App\Repositories\UserRepository;
use App\Exceptions\BadUserIdException;

class UpdateUserService 
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $credentials)
    {
        $this->repository->update($credentials);
        return true;
    }

}