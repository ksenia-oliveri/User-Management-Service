<?php

use App\Http\Controllers\Api\V1\UserApiController;

use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserApiController::class);