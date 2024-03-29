<?php

namespace App\Http\Controllers\Dtos;

use App\Dto\Dto;
use Illuminate\Http\Request;

class TaskCreateDto implements Dto
{
    public string $title;
    public $description;
    public string $status;
    public string $priority;
    public $due_date;

    public function __construct($request)
    {
        $this->title = $request->title;
        $this->description = $request->description;
        $this->status = $request->status;
        $this->priority = $request->priority;
        $this->due_date = $request->due_date;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
        ];
    }
}
