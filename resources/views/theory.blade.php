<!-- ROUTING -->

<!-- BLADE 
=======================
templeting engine in laravel

-->



<!--ROUTE
===============================
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::view('/contact','contact'); 


 -->



 <!-- PASS DATA THROUGH ROUTE 3 ways 
=====================================
Route::get('/about/{name}', function ($name) {
    return view('about',['name'=>$name]);
});

ANCHER TAG
============

<a href="/about">About</a>
<a href="/contact">contact</a>

-->

<!--CONTROLLER==================
===================================

in any framework it is the central unit

it works between model and view

** To Use controller use in the head of route file

      use App\Http\Controller\UserController;

      Route::get('user',[UserController::class,'show']);


    PASS DATA THROUGH ROUTE
    ---------------------------
       Route::get('/user/{id}',[UserController::class,'show']);

       IN  CONTROLLR===ER
          function show($id){
           return "Hellom from controller :- ". $id;
       }

 -->




 <!-- LARAVEL COMPONENT==========
--------------------------------------------------------------
===================================================================================
it is the peace of code we can use again and again
lets header , footer etc we can use in different page by cvreating once


php artisan make:component <component name>
 it's create 2 files
 HEADER.BLADE.PHP  && HEADER.PHP



-->