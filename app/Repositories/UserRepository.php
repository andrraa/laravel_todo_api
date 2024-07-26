<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    public function userRegister(array $request)
    {
        $userData = $request;

        $userData['full_name'] = ucwords($userData['full_name']);
        $userData['password'] = Hash::make($userData['password']);

        return User::query()->create($userData);
    }
}
