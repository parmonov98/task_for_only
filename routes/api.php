<?php

use App\Http\Controllers\Api\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/refresh', [AuthController::class, 'refreshToken']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
Route::group(['prefix' => 'cars', 'middleware' => 'auth:api'], function () {
    Route::get('/available', [BookingController::class, 'available']);
    Route::get('/list_cars', [BookingController::class, 'list_cars']);
    Route::get('/comfort-categories', [BookingController::class, 'comfort_categories']);
});

