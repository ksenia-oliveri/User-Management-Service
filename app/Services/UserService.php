<?php

namespace App\Services;
use App\Models\User;

class UserService
{
    // get all users
    public function getAllUsers()
    {
        return User::select('name')->get();   
    }

    // get a user by id

    public function getUserById(int $id)
    {
        return User::find($id);
    }

    //create a new user

    public function createNewUser(array $data)
    {
        return User::create($data);     
    }

    //update the user 

    public function updateUser(int $id, array $user)
    {
        return User::find($id)->update($user);
    }
    //delete the user
    public function deleteUser(int $id)
    {
        return User::destroy($id);
    }
}