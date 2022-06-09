<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

});

// Route::post('login', function(Request $request){
//     if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
//         $user = Auth::user();
//         $token = $user->createToken('JWT');
//         return response()->json($token);
//     }
//     return response()->json('Usuário invalido', 401);
// });
