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



<a href="{{URL::to('/page name')}}">About</a>

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


       Route::get('/user/{id}',[UserController::class,'lodeview']);

           function lodeview($id){
               return view('users',['user'=>$id]);
           }
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

<!-- URL GENERATION 
=================================
* CURRENT URL
-----------------------
       {{URL::current()}}

* FULL URL
-----------------------
        {{URL::full()}}



* PREVIOUS URL
-----------------------
       {{URL::previous()}}

-->



<!-- BLADE TEMPLATE
-----------------------------
=============================
*

   <h1>User blade template</h1>

   {{20+30}}

   {{$name}}

   @if($name=='sumit')
   <h1>The Name is currect</h1>
   @else
   <h1>Nmae is incurrect</h1>
   @endif


   @for($i=0;$i<5;$i++)
    <h1>{{$i}}</h1>
    @endfor
 




* @foreach($data as $i)
  <h1>{{$i}}</h1>
  @endforeach



------------INCLUDE VIEW IN VIEW----------------
=======================================

 @include('inner')


use in js and view inside CONSOLE
----------------------------------
 <script>
   var data = @json($data);
   console.log(data);
 </script>


-->



{{-- HTML FORM
 ---------------
 =============================
 MAKE CONTROLLER

   function getData(Request $req){
        return $req->input();

    }

 ROUTE GET AND POST

     Route::post('users',[UsersController::class,'getData']);
     Route::view('login','users');
 GET FORM DATA
     <form action="users" method="post">
     @csrf
       <input type="text" name="username" placeholder="enter user id">
       <br><br>
       <input type="password" name="passord" placeholder="enter your password">
       <br><br>
       <button type="submit">Login</button>
     </form>

 
 --}}



{{--ADD BOOTSTRAP IN LARAVEL
 ==========================================
 3 WAYS
 * bootstrap eith cdn
      CONTENT DELIVERY NETWORK

 * add bbotstrap with single page

 * add bootstrap in multi file project

    

 * common file for bootstrap
      @include('xyz')
 

   --}}



   {{-- MIDLEWARE
    =---========================
    * if we want specific rules and authentication and for filteration
    * we can write once and use in many pages

    Type:=3
    Global,Grouped,Routed  === Middleware


    Register in kernel.php


    GLOBAL 
    --------
      \App\Http\Middleware\checkAge::class,
     
      checkAge.php
      -------------
        if($request->age && $request->age<18){
            return redirect('noaccess');
        }


    GROUP 
    --------------
         kernel.php
         --------------
         'protectPage' =>[
            \App\Http\Middleware\ageCheck::class,

        ]

        web.php
        ----------
        Route::group(['middleware'=>['protectPage']],function(){
             Route::view('users','users');
              });

              ageCheck.php
              --------------
              if($request->age && $request->age<18)
                {
            return redirect('noaccess');
                }


    ROUTE MIDDLEWARE
    --------------------
    ================================================
            kernel.php
         --------------
         'ageProtected' => \App\Http\Middleware\AgeCheck::class,
          
         web.php
          ---------------
         Route::view('contact','contact')->middleware('ageProtected');

    
    
    --}}