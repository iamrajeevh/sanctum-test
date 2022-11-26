<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(UserController::class)->group(function(){
    Route::post('create-user','create');
    Route::post('login-user','loginUser');
});
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::controller(UserController::class)->group(function(){
        Route::post('get-profile-details','getUserProfile');
        Route::post('logout','logout');
    });
});








