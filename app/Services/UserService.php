<?php

namespace App\Services;
use App\Models\User;
use Cache;

class UserService
{
    // get all users
    public function getAllUsers(): mixed
    {
        $users = User::select('id', 'name', 'email')->get();
        return $users;
    }

    // get a user by id

    public function getUserById(int $id)
    {   
        return User::find($id); 
    }

    //create a new user

    public function createNewUser(array $data)
    {
        $user = User::create($data); 
        //Cache::put('users:' . $user['id'], $user, 3600);

        return $user;     
    }

    //update the user 

    public function updateUser(int $id, array $user): mixed
    {   
        $user = User::find($id)->update($user); 
        Cache::forget('user:' . $id); 
        Cache::put('user:' . $id, $user, 3600);
    
        return $user;
    }
    //delete the user
    public function deleteUser(int $id): void  
    {
        User::destroy($id);
        Cache::forget('user:' . $id); 
    }
}