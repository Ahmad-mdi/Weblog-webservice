<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\user;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function signup(AuthRequest $request)
    {
        $userDataList = $request->only([
           'name' , 'email' ,'password',
        ]);
        return $this->userService->signup($userDataList);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(user $user)
    {
        //
    }


    public function edit(user $user)
    {
        //
    }


    public function update(Request $request, user $user)
    {
        //
    }


    public function destroy(user $user)
    {
        //
    }
}
