<?php

namespace App\Services\User;

use App\Repositories\UserRepository;
use App\Exceptions\BadUserIdException;

class UpdateUserService 
{

    public function __construct(protected UserRepository $repository){}

    public function execute(array $credentials)
    {
        $this->repository->update($credentials);
        return true;
    }

}