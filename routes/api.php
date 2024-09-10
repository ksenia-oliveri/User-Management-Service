<?php

use App\Http\Controllers\Api\V1\UserApiController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::get('/users', [UserApiController::class, 'index']);
    Route::get('/users/user_id', [UserApiController::class, 'show']);
    Route::post('/create/user', [UserApiController::class, 'store']);
});
