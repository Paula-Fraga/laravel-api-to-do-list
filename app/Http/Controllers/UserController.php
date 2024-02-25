<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\Dtos\UserCreateDto;
use App\Http\Controllers\Dtos\UserUpdateDto;
use App\Services\User\CreateUserService;
use App\Services\User\UpdateUserService;

class UserController extends Controller
{
    private $create, $update;

    public function __construct(
        CreateUserService $create,
        UpdateUserService $update
    )
    {
        $this->create = $create;
        $this->update = $update;
    }

    public function create(UserCreateRequest $request)
    {
        try {
            $dtoUser = new UserCreateDto($request);
            $this->create->execute($dtoUser->toArray());
            return response()->json('User created successfully!', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }  
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $dtoUser = new UserUpdateDto($request, $id);
            $this->update->execute($dtoUser->toArray());
            return response()->json('User edited successfully!', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }  
    }
}
