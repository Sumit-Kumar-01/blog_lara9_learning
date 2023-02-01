<?php

use App\Http\Controllers\DeviceCont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;

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

//First API in Laravel

Route::get('data',[dummyAPI::class,'getData']);

//get data with API and with parameter
Route::get('list/{id?}',[DeviceCont::class,'list']);

