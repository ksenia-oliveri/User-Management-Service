<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Services\UserService;
use Illuminate\Http\Request;


class UserApiController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }

    public function index()
    {
        return response($this->userService->getAllUsers(), 200);
    }

    public function show(int $id)
    {
        $user = $this->userService->getUserById($id);
        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response($user, 200);
    }

    public function store(StoreRequest $request)
    {   
        $user = $this->userService->createNewUser($request->validated());
        event(new UserCreated($user));
        return response($user, 201);
    }

    public function update(int $id, StoreRequest $request)
    {
        return response($this->userService->updateUser($id, $request->validated()), 204);
    }

    public function destroy(int $id)
    {
        return response($this->userService->deleteUser($id), 204);
    }
}
