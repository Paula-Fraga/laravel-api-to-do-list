<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

Route::get('/', function() {
    return response()->json(['api_name' => 'Lista de Tarefas', 'api_version' => '1.0.0']);
});

Route::post('user/create', [UserController::class ,'create']);
Route::post('login', [AuthController::class ,'login']);

Route::middleware(['protectedRouteAuth'])->group(function () {

    # User.
    Route::post('me', [AuthController::class,'me']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::put('user/update/{id}', [UserController::class,'update']);

    # Tasks.
    Route::get('task/get/{id}', [TaskController::class,'getById']);
    Route::get('task/list', [TaskController::class,'list']);
    Route::post('task/create', [TaskController::class,'create']);
    Route::put('task/update/{id}', [TaskController::class,'update']);
    Route::delete('task/delete/{id}', [TaskController::class,'delete']);

});
