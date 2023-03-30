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
use App\Http\Controllers\BcardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\fetchcontroller;
use App\Http\Controllers\API\TwitController;
use App\Http\Controllers\API\poster_data_controller;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\FacebookApiController;
use App\Http\Controllers\API\AdminApiController;
<<<<<<< Updated upstream
use App\Http\Controllers\API\youtube_data_controller;
=======
use App\Http\Controllers\API\InstagramApiController;
>>>>>>> Stashed changes




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

Route::get('/card',[BcardController::class, 'bcard']);

Route::get('/home',[HomeController::class, 'home']);

Route::get('fbook', [FacebookApiController::class, 'index']);

Route::put('edit/{id}', [ AdminApiController::class, 'edit']);
Route::delete('delete/{id}', [ AdminApiController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::get('/display',[fetchcontroller::class, 'fetch']);
 Route::get('/twitter',[TwitController::class, 'twitter']);
 Route::get('/poster',[poster_data_controller::class, 'poster']);
 Route::get('/youtube',[youtube_data_controller::class, 'youtube']);


 Route::post('/add/brand',[BrandController::class, 'store']);
 Route::post('/edit/brand/{id}',[BrandController::class, 'edit']);

<<<<<<< Updated upstream
//fetching for fb post
Route::get('/displaypost',[FetchpostController::class, 'index']);

// fetching for insta post
Route::get('/showpost',[FetchipostController::class, 'ipost']);

//fetch api of facebook ads and facebook posts 
Route::get('facebook', [FacebookApiController::class, 'facebook']);


=======
 Route::post('/instagram',[InstagramApiController::class, 'instagram']);
>>>>>>> Stashed changes
