<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GalleryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\FbookController;
use App\Http\Controllers\BussinessCardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    Route::get('google',function(){

    return view('googleAuth');
        
    });

Route::get('index',function(){
    return view('index');
});

Route::get('log',function(){
    return view('loginpage');
});

Route::get('admin',function(){
    return view('adminpage');
});

Route::get('page',function(){
    return view('page');
});

Route::get('dash',function(){
    return view('dashboard');
});

Route::get('ind',function(){
    return view('industry.index');
});

       

Route::post('post-login', [AdminController::class, 'postLogin'])->name('login.post');

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);        
//Route::get('auth/google/callback',[LoginController::class, 'handleGoogleCallback']);


Route::get('auth/insta', [GalleryController::class, 'redirectToInstagramProvider']);     
Route::get('auth/insta/callback', [GalleryController::class, 'instagramProviderCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectFacebook']);
Route::get('auth/facebbok/callback', [FacebookController::class, 'facebookCallback']);

Route::get('auth/apple',[AppleLoginController::class,'appleLogin']);

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });

 Route::resource('industry', IndustryController::class);
 Route::resource('fbook', FbookController::class);
 Route::resource('bcard', BussinessCardController::class);
  Route::post('/update/bcard/{id}', [BussinessCardController::class,'update'])->name('bcard.update');




//  Route::post('delete-industry', [IndustryController::class,'destroy']);
//  Route::get('admins', [IndustryController::class, 'indexs'])->name('admins.index');