<?php

namespace App\Services;
use App\Models\User;

class UserService
{
    // get all users
    public function getAllUsers()
    {
        return $users = User::all();   
    }

    //create a new user

    public function createNewUser($name, $email)
    {
        return User::create(['name' => $name, 'email' => $email, 'created_at' => now(), 'updated_at' => now()]);     
    }
}