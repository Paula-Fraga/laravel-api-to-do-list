<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;

class ListTaskService 
{

    public function __construct(protected TaskRepository $repository){}
   

    public function execute($id = null)
    {
        if(!$id)
        {
            return $this->repository->list();
        }
        return $this->repository->find($id);
    }

}