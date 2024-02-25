<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;
use Carbon\Carbon;

class UpdateTaskService 
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $credentials)
    {
        if($credentials['due_date']) 
        {
            $credentials['due_date'] = Carbon::createFromFormat('d-m-Y', $credentials['due_date'])->toDateString();
        }
        $this->repository->update($credentials);
        return true;
    }

}