<?php

namespace App\Services;
use App\Models\User;
use App\Repositories\UserRepository;

class UserService implements UserRepository
{
    public function getAllUsers()
    {
        return   User::paginate(10)/*->load('posts')*/;
    }
}
