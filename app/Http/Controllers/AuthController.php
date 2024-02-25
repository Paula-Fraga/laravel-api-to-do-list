<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\LoginService;
use App\Http\Controllers\Dtos\LoginDto;

class AuthController extends Controller
{

    private $loginService;

    public function __construct(
        LoginService $loginService
    )
    {
        $this->loginService = $loginService;
    }

    public function login(Request $request)
    {
        try {
            $dtoLogin = new LoginDto($request);
            $auth = $this->loginService->execute($dtoLogin->toArray());
            return response()->json($auth, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }   
    }
   
    public function me()
    {
        try {
            return response()->json(auth()->user(), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        } 
    }

    public function logout()
    {
        try {
            auth()->logout();
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        } 

        return response()->json(['message' => 'Successfully logged out']);
    }

}
