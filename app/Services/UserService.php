<?php

namespace App\Services;
use App\Models\User;
use Cache;

class UserService
{
    // get all users
    public function getAllUsers()
    {
       
        $users = Cache::remember('users:all', 3000,  function() {
            return User::get();
        });
        return $users;
    }

    // get a user by id

    public function getUserById(int $id)
    {   
        return Cache::get('users:' . $id);
       
    }

    //create a new user

    public function createNewUser(array $data)
    {
        Cache::forget('users:all');
        $user = User::create($data);
        return $user;
        
    }

    //update the user 

    public function updateUser(int $id, array $user)
    {   
        Cache::forget('users:all');
        $user = User::find($id)->update($user);  
        return $user;
    }
    //delete the user
    public function deleteUser(int $id)
    {
        Cache::forget('users:all');
        return User::destroy($id);
    }
}