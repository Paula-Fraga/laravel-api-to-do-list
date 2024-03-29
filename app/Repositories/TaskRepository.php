<?php

namespace App\Repositories;
use App\Models\Task;

class TaskRepository
{
    
    public function __construct(protected Task $model){}

    public function find($id)
    {
        return $this->model->where('user_id', auth()->user()->id)
        ->find($id);
    }

    public function list()
    {
        return $this->model->where('user_id', auth()->user()->id)
        ->get();
    }

    public function create($date)
    {
        return $this->model->create([
            'title' => $date['title'],
            'description' => $date['description'],
            'status' => $date['status'],
            'priority' => $date['priority'],
            'due_date' => $date['due_date'],
            'user_id' => auth()->user()->id,
        ]);
    }

    public function update($date)
    {
        return $this->model->where('id', $date['id'])
        ->where('user_id', auth()->user()->id)
        ->update([
            'title' => $date['title'],
            'description' => $date['description'],
            'status' => $date['status'],
            'priority' => $date['priority'],
            'due_date' => $date['due_date'],
        ]);
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)
        ->where('user_id', auth()->user()->id)
        ->delete();
    }
}