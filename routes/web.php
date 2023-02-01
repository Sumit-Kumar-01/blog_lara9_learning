<?php

use App\Http\Controllers\AccessorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\AggregateController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MutatorController;
use App\Http\Controllers\OnetoManyController;
use App\Http\Controllers\OnetoOneController;


use Illuminate\Support\Str;

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


// Fluent String Concept
// --------------------------------


// echo "Hello ! ";
// $info="hi, lets learn laravel";
// // $info=Str::ucfirst($info);
// // $info=Str::replaceFirst("Hi","Sumit",$info);
// // $info=Str::camel($info);

// $info=Str::of($info)->ucfirst($info)
// ->replaceFirst("Hi","Sumit",$info);
// echo $info;


Route::get('/', function () {
        return view('welcome');
    });

Route::view('home','home');

Route::view('noaccess','noaccess');
Route::group(['middleware'=>['protectPage']],function(){
    Route::view('users','users');

    // Route::get('/', function () {
    //     return view('welcome');
    // });
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

//joins



//Accessor

Route::get('accessor',[AccessorController::class,'ind']);

//Mutator

Route::get('mutator',[MutatorController::class,'ind']);

//one to one relations
Route::get('relation',[OnetoOneController::class,'index']);


//one to many relations
Route::get('relationm',[OnetoManyController::class,'index']);

//Route Model Binding
Route::get('rmb/{key:name}',[DeviceController::class,'index']);



