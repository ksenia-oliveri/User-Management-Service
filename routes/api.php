<?php

use App\Http\Controllers\Api\V1\UserApiController;

use Illuminate\Support\Facades\Route;

Route::get('v1/users', [UserApiController::class, 'index']);
Route::post('v1/create/user', [UserApiController::class, 'store']);