<?php

namespace App\Http\Controllers\Api\V1;

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

    public function show(Request $request)
    {
        return response($this->userService->getUserById($request->input('id')), 200);
    }

    public function store(StoreRequest $request)
    {   
        return response($this->userService->createNewUser($request->validated()), 201);
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
