<?php

namespace App\Http\Controllers;

use App\Exceptions\ProblemIdException;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Controllers\Dtos\TaskCreateDto;
use App\Services\Task\CreateTaskService;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Controllers\Dtos\TaskUpdateDto;
use App\Services\Task\DeleteTaskService;
use App\Services\Task\UpdateTaskService;
use App\Services\Task\ListTaskService;

class TaskController extends Controller
{
    private $create, $update, $delete, $list, $byid;

    public function __construct(
        CreateTaskService $create,
        UpdateTaskService $update,
        DeleteTaskService $delete,
        ListTaskService $list
    )
    {
        $this->create = $create;
        $this->update = $update;
        $this->delete = $delete;
        $this->list = $list;
    }

    public function create(TaskCreateRequest $request)
    {
        try {
            $dtoTask = new TaskCreateDto($request);
            $this->create->execute($dtoTask->toArray());
            return response()->json('Task created successfully!', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }
    }

    public function update(TaskUpdateRequest $request, $id)
    {
        try {
            $dtoTask = new TaskUpdateDto($request, $id);
            $this->update->execute($dtoTask->toArray());
            return response()->json(['error' => false, 'message' => 'Task edited successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $this->delete->execute($id);
            return response()->json(['error' => false, 'message' => 'Task deleted successfully!'], 200);
        } catch (ProblemIdException $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 412);
        }
    }

    public function list()
    {
        try {
            $tasks = $this->list->execute();
            return response()->json(['error' => false, 'data' => $tasks], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }
    }

    public function getById($id)
    {
        try {
            $task = $this->list->execute($id);
            return response()->json(['error' => false, 'data' => $task], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }
    }
}
