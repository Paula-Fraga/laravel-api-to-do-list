<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;
use App\Exceptions\ProblemIdException;

class DeleteTaskService 
{

    public function __construct(protected TaskRepository $repository){}

    public function execute(int $id)
    {
        if (!$this->repository->find($id)) {
            throw new ProblemIdException("Task does not exist or does not belong to your user!");
        }

        $this->repository->delete($id);
        return true;
    }

}