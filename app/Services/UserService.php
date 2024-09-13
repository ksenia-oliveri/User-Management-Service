<?php

namespace App\Services;
use App\Models\User;
use Cache;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    // get all users
    public function getAllUsers(): mixed
    {
        $users = Cache::remember('users:', 3000,  function(): Collection {
            return User::all();
        });
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
        return User::create($data);      
    }

    //update the user 

    public function updateUser(int $id, array $user): mixed
    {   
        $user = User::find($id)->update($user); 
        Cache::forget('users:' . $id); 
        Cache::put('users:' . $id, $user);
    
        return $user;
    }
    //delete the user
    public function deleteUser(int $id): void  
    {
        User::destroy($id);
        Cache::forget('users:' . $id); 
    }
}