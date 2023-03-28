<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\FetchpostController;
use App\Http\Controllers\API\FetchipostController;
use App\Http\Controllers\AuthOtpController;
use App\Http\Controllers\IndustrytypeController;
use App\Http\Controllers\API\fetchcontroller;


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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::get('/display',[FetchpostController::class, 'index']);
Route::get('/show',[FetchipostController::class, 'ipost']);


     
// Route::post('login', [RegisterController::class, 'login']);

Route::post('/login',[AuthOtpController::class, 'login']);

Route::get('/display',[IndustrytypeController::class, 'index']);

Route::get('/select/{id}',[IndustrytypeController::class, 'select']);

//Route::post('/login',[AuthOtpController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


 Route::get('/display',[fetchcontroller::class, 'fetch']);

// Route::get('admin',function(){
//     return view('adminpage');
// });
