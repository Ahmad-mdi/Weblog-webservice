<?php

namespace App\Services;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService implements UserRepository
{
    use ApiResponse;
    public function getAllUsers()
    {
        return   User::paginate(10)/*->load('posts')*/;
    }

    public function signup(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = $user->createToken('ahmad')->accessToken;
        return $this->successResponse(200,[
            'user' => $user,
            'token' => $token,
        ],'user ok');
    }

    public function login(Request $request)
    {
        $user = User::query()->where('email',$request->email)->firstOrFail();
        if (!Hash::check($request->password,$user->password)) {
            return $this->errorResponse(422,null,'password is incorrect');
        }
        $token = $user->createToken('ahmad')->accessToken;
        return $this->successResponse(200,[
            'user' => $user,
            'token' => $token,
        ],'user logIn');
    }
}
