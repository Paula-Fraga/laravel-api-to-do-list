<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;

class ListTaskService 
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id = null)
    {
        if(!$id)
        {
            return $this->repository->list();
        }
        return $this->repository->find($id);
    }

}