<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\AuthRequest;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\user;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function signupUser(AuthRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->userService->signup($request);
    }


    public function loginUser(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->userService->login($request);
    }


    public function destroy(user $user)
    {
        //
    }
}
