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


    {{-- CONNECT WITH DATABASE
        ====================================================================================
        controller
        ------------------
            function index(){
                return DB::select("select * from user");
            }   

    --}}

    {{-- LARAVEL MODEL WITH DB
        =====================================================================================
        
        * model-> map database table with class name
        * define database structure
        * write business logic
        
        
        
        --}}

  ******* {{-- HTTP CLIENT
        ================================================================
        * It is use to implement/ use the apis .

        GET DATA FROM API
        -------------------
        BLADE.PHP
        ----====------
                <table border="1">
                    <tr>

                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Profile Photo</td>
                    </tr>

                    @foreach($collection as $item)
                    <tr>

                    <td>{{$item['id']}}</td>
                    <td>{{$item['first_name']}}</td>
                    <td>{{$item['email']}}</td>
                    <td><img src={{$item['avatar']}} alt=""></td>
                    </tr>

                    @endforeach

                </table>



        CONTROLLER
        ----====----
        use Illuminate\Support\Facades\Http;


                function index(){
                    $data= Http::get("reqres.in/api/users?page=1");
                    return view('users',['collection'=>$data['data']]);
                }
        

        
        --}}

***********{{--HTTP REQUEST METHOD

        * when we submit , fetch, download all of the things in any website
        -------------------------------------------------------
        *GET, PUT, POST,  DELETE, HEAD, PATCH, OPTIONS--
        ----------------------|^|mostly used
        ----------------------------------------------------
        blade.php
        -----------
            <form action="users" method="post">
                @csrf
                {{@method_field('PUT')}}
                <input type="text" name="user" placeholder="Enter name"/><br><br>
                <input type="password" name="password" placeholder="Enter password"/><br><br>
                <button>Login</button>
            </form>

        web.php
        ----------
            Route::view("login","users");
            Route::put("users",[UserController::class,"testRequest"]);

        controller
        ------------
                function testRequest(Request $req){
                    return $req->input();
                    // echo "form Submited";
                }



            

    
    
        --}}

************{{--SESSION
    -------------------------------------
    web.php
    =======
            // Route::view("login","login");
            Route::post("login",[UserAuth::class,"userLogin"]);

            Route::view('profile','profile');
            Route::get('/logout', function () {
                if(session()->has('user'))
                {
                    session()->pull('user',null);
                }
                return redirect('login');
            });

            Route::get('/login', function () {
                if(session()->has('user'))
                {
                    return redirect('profile');
                }
                return view('login');
            }); 
    
            login.blade.php
            ----------------
            <h1>login </h1>
            <form action="" method="post">
            @csrf
            <input type="text" name="user" placeholder="User name">
            <br><br>
            <input type="password" name="password" placeholder="User password">
            <br><br>
            <button type="submit">Login</button>


            </form>

            profile.blade.php
            -----------------
            <h1>Profile Page</h1>
            <h2>Hello , {{session('user')}}</h2>

            <a href="logout">Logout</a>


            userAuth.controller
            ----------------------
            function userLogin(Request $req){
            $data= $req->input('user');
            $req->session()->put('user',$data);
            // echo session('user');
            return redirect('profile');
             }
    --}}


**************  UPLOAD FILE IN LARAVEL
{{-- 
    upload.blade.php
    ----------------
        <h1>Upload File Here</h1>
        <form action="upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file"><br><br>
        <button type="submit">Upload File</button>

        </form>

    web.php
    ------------
    Route::view('upload','upload');
    Route::post('upload',[UploadController::class,'upload']);

    controller
    -----------
        function upload(Request $req){
            return $req->file('file')->store('img');
         }
    
    --}}

************LOCALIZATION********************
{{-- 
    * putting your website in multiple languuage is called localization for different country
    * we need to make respective file and put string respectively
    * we have to create different pages for different languages in app->lang with specific folder
    * then we can do changes for default language in the config->app.php-> find locale

    web.php
    ----------
    // Route::view('profile','profile');
    Route::get('/profile/{lang}',function($lang){
        App::setlocale($lang);
        return view('profile');
    });
    
    profile.blade.php
    ------------------
    <h1>{{__('profile.welcome')}}</h1>
    <a href="">{{__('profile.list')}}</a>
    <a href="">{{__('profile.about')}}</a>
    <a href="">{{__('profile.contact')}}</a>


--}}


**********USER LIST FROM DATABASE TABLE***********
**********                             ***********
{{--
    make model
    ---------
    
    web.php
    ---------
    Route::get('list',[memberController::class,'show']);

    list.blade.php
    --------------
        <h1>Members List from database</h1>

        <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>email</td>
            <td>address</td>
        </tr>

        @foreach($members as $item)
            <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item['address']}}</td>
            </tr>

        @endforeach
        </table>

    memberController.php
    -----------------------
         function show(){
            $data= Member::all();
            return view('list',['members'=>$data]);
        }
 --}}

 **********Laravel Pagination*********
 **********                  *********
 {{--
    make model
    ----------

    make controller and view
    ------------------------

    controller
    ----------
        function show(){
            $data= Member::paginate(1);
            return view('list',['members'=>$data]);
        }



    view
    -------

        <div>
        {{$members->links()}}
        </div>

        <style>
            .w-5{
                display:none;
                
            }
        </style>
        
 --}}



 *********SAVE DATA IN DATABASE**********
 *********                     **********
 {{--
    addmember.blade.php
    -------------------
            <h1>Add Members to DB</h1>
            <form action="" method="post">
            @csrf
            <input type="text" name="name" placeholder="name"><br><br>
            <input type="email" name="email" placeholder="email"><br><br>
            <input type="text" name="address" placeholder="address"><br><br>
            <button type="submit">Submit</button>
            </form>

    MembersController.php
    ---------------------
            function addData(Request $req){
                $data =new Member;
                $data -> name = $req->name;
                $data -> email = $req->email;
                $data -> address = $req->address;
                $data->save();
                return redirect('add');
            }

            with fillable rule-----------------------
            $data = $req->all();
            Member::create($data);
            return redirect('add');
    

            Member.php
            -----------
                public $timestamps=false;
                public $fillable= [
                    'name','email','address'
                ];
 --}}


 *********DELETE FROM DATABASE*********
 *********                    *********
 {{--
        MAKE MODEL, LIST WITH DELETE BUTTON, MAKE ROUTE, DELETE DATA IN TABLE
        -----------------------------------------------------------------------
        list.blade.php
        --------------
                <td>
            <a href={{"delete/".$item['id']}}><button class="fa fa-trash-o btn btn-outline-danger btn-sm"></button></a>
            </td> 
        
        memberController.php
        ---------------------
                function delete($id){
                    $data= Member::find($id);
                    $data->delete();
                    return redirect('list');
                }

        web.php
        ---------
                Route::get('delete/{id}',[memberController::class,'delete']);
 --}}


 ***********UPDATE IN DATABASE************
 ***********                  *************
 {{-- 
        
 --}}