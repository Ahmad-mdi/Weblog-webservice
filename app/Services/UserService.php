<?php

namespace App\Services;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserService implements UserRepository
{
    use ApiResponse;
    public function getAllUsers()
    {
        return   User::paginate(10)/*->load('posts')*/;
    }

    public function signup(array $userSignup): \Illuminate\Http\JsonResponse
    {
        $user = User::query()->create($userSignup);
        $token = $user->createToken('ahmad')->accessToken;
        return $this->successResponse(200,[
            'user' => $user,
            'token' => $token,
        ],'user ok');
    }

}
