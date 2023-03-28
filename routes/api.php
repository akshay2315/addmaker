<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\AuthOtpController;
use App\Http\Controllers\IndustrytypeController;
use App\Http\Controllers\API\fetchcontroller;
use App\Http\Controllers\API\TwitController;
use App\Http\Controllers\API\poster_data_controller;




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
// Route::get('/display',[eventfetchController::class, 'fetch']);
Route::post('register', [RegisterController::class, 'register']);
// Route::post('login', [RegisterController::class, 'login']);

Route::post('/login',[AuthOtpController::class, 'login']);

Route::get('/display',[IndustrytypeController::class, 'index']);

Route::get('/select/{id}',[IndustrytypeController::class, 'select']);

//Route::post('/login',[AuthOtpController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::get('/display',[fetchcontroller::class, 'fetch']);
 Route::get('/twitter',[TwitController::class, 'twitter']);
 Route::get('/poster',[poster_data_controller::class, 'poster']);

// Route::get('admin',function(){
//     return view('adminpage');
// });
