<?php

namespace App\Http\Controllers\Dtos;

use App\Dto\Dto;
use Illuminate\Http\Request;

class TaskUpdateDto implements Dto
{
    public int $id;
    public string $title;
    public string $description;
    public string $status;
    public string $priority;
    public $due_date;

    public function __construct($request, $id)
    {
        $this->id = $id;
        $this->title = $request->title;
        $this->description = $request->description;
        $this->status = $request->status;
        $this->priority = $request->priority;
        $this->due_date = $request->due_date;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
        ];
    }
}
