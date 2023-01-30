<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;

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




// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::view('/contact','contact');

// Route::get('/user/{id}',[UserController::class,'show']);

// Route::view('/user','user');

// Route::get('/user/{id}',[UserController::class,'lodeview']);


// Route::get('users',[UsersController::class,'loadview']);


// Route::post('users',[UsersController::class,'getData']);
// Route::view('login','users');

// Route::view('users','users');
// Route::view('noaccess','noaccess');


Route::view('home','home');

Route::view('noaccess','noaccess');
Route::group(['middleware'=>['protectPage']],function(){
    Route::view('users','users');

    Route::get('/', function () {
        return view('welcome');
    });
});


Route::view('contact','contact')->middleware('ageProtected');

// Route::get("users",[UserController::class,"index"]);

Route::view("login","users");
Route::put("users",[UserController::class,"testRequest"]);

