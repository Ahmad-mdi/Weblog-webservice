<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface UserRepository
{
    public function getAllUsers();
    public function signup(array $userSignup);
}
