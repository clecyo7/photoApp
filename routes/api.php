<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);

Route::post('userCreate',[ UserController::class, 'store']);

Route::middleware('auth:api')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('photo', PhotoController::class);
    Route::resource('event', EventController::class);
});

