<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {   
        $name = $request->input('name');
        $email = $request->input('email');

        return response($this->userService->createNewUser($name, $email), 201);
    }
}
