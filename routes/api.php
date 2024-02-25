<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

Route::get('/', function() {
    return response()->json(['api_name' => 'Lista de Tarefas', 'api_version' => '1.0.0']);
});

Route::post('users/create', [UserController::class ,'create']);
Route::post('login', [AuthController::class ,'login']);

Route::middleware(['protectedRouteAuth'])->group(function () {

    # Users.
    Route::post('me', [AuthController::class,'me']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::put('users/update/{id}', [UserController::class,'update']);

    # Tasks.
    Route::get('tasks/get/{id}', [TaskController::class,'getById']);
    Route::get('tasks/list', [TaskController::class,'list']);
    Route::post('tasks/create', [TaskController::class,'create']);
    Route::put('tasks/update/{id}', [TaskController::class,'update']);
    Route::delete('tasks/delete/{id}', [TaskController::class,'delete']);

});
