<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;

class CreateTaskService 
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $credentials)
    {
        $this->repository->create($credentials);
        return true;
    }

}