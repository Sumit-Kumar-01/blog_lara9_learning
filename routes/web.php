<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\AggregateController;

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

// Route::view("login","users");
// Route::put("users",[UserController::class,"testRequest"]);




// Route::view("login","login");
// Route::post("login",[UserAuth::class,"userLogin"]);

// Route::view('profile','profile');
// Route::get('/logout', function () {
//     if(session()->has('user'))
//     {
//         session()->pull('user',null);
//     }
//     return redirect('login');
// });

// Route::get('/login', function () {
//     if(session()->has('user'))
//     {
//         return redirect('profile');
//     }
//     return view('login');
// });



// Route::view('upload','upload');
// Route::post('upload',[UploadController::class,'upload']);


// Route::view('profile','profile');
Route::get('/profile/{lang}',function($lang){
    App::setlocale($lang);
    return view('profile');
});



Route::get('list',[memberController::class,'show']);

Route::view('add','addmember');
Route::post('add',[MemberController::class,'addData']);

Route::get('delete/{id}',[memberController::class,'delete']);

Route::get('edit/{id}',[memberController::class,'showData']);
Route::post('edit',[memberController::class,'update']);

// query builder

Route::get('list1',[MembersController::class,'operations']);

//Aggregate functions

Route::get('agrt',[AggregateController::class,'operations']);
