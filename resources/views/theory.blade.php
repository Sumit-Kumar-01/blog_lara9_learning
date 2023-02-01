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

    memberController.php
    ---------------------
            function addData(Request $req){
                $data =new Member;
                $data -> name = $req->name;
                $data -> email = $req->email;
                $data -> address = $req->address;
                $data->save();
                return redirect('add');
            }

            with fillable rule---------in model--------------
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
        list.blade.php
        --------------
                    <a href={{"edit/".$item['id']}}><button class="fa fa-edit btn btn-outline-warning btn-sm"></button></a>
        
        memberController.php
        --------------------
        function update(Request $req){
            $data= Member::find($req->id);
            // $data->name=$req->name;
            // $data->address=$req->address;
            // $data->email=$req->email;
            // $data->save();

            $input = $req->all();
            $data->update($input);

            return redirect('list');
        }

        edit.blade.php
        ------------------
            <h1>update member</h1>
            <form action="/edit" method="post">
            @csrf
            <input type="hidden" name="id"  value={{$data->id}}>
            <input type="text" name="name" value="{{$data->name}}"> <br><br>
            <input type="text" name="address" value="{{$data->address}}"> <br><br>
            <input type="text" name="email" value="{{$data->email}}"> <br><br>
            <button type="submit">Update</button>
            </form>

        web.php
        ----------
            Route::get('edit/{id}',[memberController::class,'showData']);
            Route::post('edit',[memberController::class,'update']);
 --}}


 **********Query Builder in Laravel***********
 **********                         ***********
 {{--
    
    *get result eith table name
    *where condition
    * find,count
    * insert,update,delete

    MembersController.php
    ----------------------

    function operations(){
        // $data= DB::table('members')->get();
        // return view('list1',['data'=>$data]);


        // return DB::table('members')
        // ->where('address','delhi')
        // ->get();


        // return (array)DB::table('members')->find(4);

        //  return DB::table('members')->count();

        // return DB::table('members')
        // ->insert([
        //     'name'=>'Sonu',
        //     'email'=>'sonu@gmail.com',
        //     'address'=>'cuttack'
        // ]);


        // return DB::table('members')
        // ->where('id',14)
        // ->update([
        //     'name'=>'Sonu b',
        //     'email'=>'sonu@gmail.com',
        //     'address'=>'cuttack'
        // ]);
        

        // return DB::table('members')
        // ->where('id',9)->delete();
      
        list1.blade.php
        -----------------
        <h1></h1>
            <table>
            @foreach($data as $i)
                <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->name}}</td>
                    <td>{{$i->email}}</td>
                    <td>{{$i->address}}</td>
                </tr>
            @endforeach
            </table>


        web.php
        ---------
        Route::get('list1',[MembersController::class,'operations']);

 --}}

 **************Aggregates Query in Laravel****************
 **************                            ***************
 {{--
    sum,max,min,avg etc
    ====================
        AggregateController.php
        -----------------------
        function operations(){
        // return DB::table('members')->get();

        //sum
        // return DB::table('members')->sum('id');

        //min
        // return DB::table('members')->min('id');

        //max
        return DB::table('members')->max('name');

        // avg
        // return DB::table('members')->avg('id');

    }


    agrt.blade.php
    -------------


    web.php
    -----------
    Route::get('agrt',[AggregateController::class,'operations']);

    

 --}}

 **************JOUIN IN LARAVEL****************
 **************                ****************
 {{--
    EmployeeController.php
    ------------------------
        function getData(){
            return DB::table('employee')
            ->join('company','employee.id','=','company.employee_id')
            ->select('company.*','employee.*')
            ->where('employee.name','sonu')
            ->get();
        } 

    web.php
    ----------
        Route::get('listj',[EmployeeController::class,'getData']);

 --}}

 **********Migration Important Command**************
 *************                     *****************
 {{--
   * how to reset migration
    -----------------------
            php artisan migrate:reset
                to remove all migrated file

   * Rollback Migration
    -----------------------
            php artisan migrate:rollback --step 3
              to remove last 3 step,  it count last migration as one step.


   * Rollback Step, Refresh
    ------------------------
            php artisan migrate:refresh



   * Single File Migration
    ------------------------


    php artisan make:migration create_test5_table

    php artisan migrate

    php artisan migrate:reset

    php artisan migrate:rollback --step 3

    php artisan migrate --path==/database/migrations/2023_09_21_141958_create_test5_table.php

    php artisan migrate:refresh

    
 --}}


 ********Laravel Jetstream***************
 *********               ****************
 {{--

 --}}


 ************LARAVEL ACCESSOR**************
 ******************************************
 {{-- 
    when we fetch data from database and before showing we want to modifi then we can do through 
    
    model Member.php
        ---------------
        function getNameAttribute($value){
            return ucFirst($value.', India');
        }

        // function getAddressAttribute($value){
        //     return $value.', India';
        // }
 
        AccessorController.php
        --------------------------
            function ind(){
                return Member::all();
            }
            
        Make Route also
        ----------------
    --}}


    **************MUTATOR*****************
    ****************************************

    {{-- 
        WHEN WE are save data in database but we want some modification the we have to use mutator
        
        MutatorController.php
        ----------------------
            function ind(){
                $data=new Member;
                $data->name="Sumit";
                $data->email="xyz@test.com";
                $data->address="Mumbai";
                $data->save();

            }

        model Member.php
        -----------------
            public function setNameAttribute($value){
                return $this->attributes['name']='Mr. '.$value;
            }

            public function setAddressAttribute($value){
                return $this->attributes['address']=$value.", India";
            }

        also make a route to hit function
        -------------------------------
    --}}



    *******ONE TO ONE RELATION**********
    ************************************
    {{-- 
        MAKE ATLEAST 2 MODELS AND  1 CONTROLLER
        MAKE RELATION AND SHOW DATA

        one employee can work on only one company ****

        OnetoOneController.php
        -------------------------
            function index(){
                return Employee::find(2)->companyData;
            }

        Employee.php model
        -------------------
            function companyData(){
                return $this->hasOne('App\Models\Company');
            }

        in another model we do not have to do anything simply left it.

        make sure create a route also ;
    --}}

    *******ONE TO Many RELATION**********
    ************************************
    {{-- 
        
        A record of one table has relations with multiple records of another table.

        OnetoManyController.php
        ------------------------
            function index(){
                return Employee::find(2)->deviceData;
            }

        Employee.php model
        ----------------------
            function deviceData(){
                return $this->hasMany('App\Models\Device');
            }

        do the routing part also

    --}}


    *******Fluent String**********
    ******************************
{{--
    * when we perform operation on string we have to assign many times values to a variabole;

    simply we can perform in route page
    ----------------------------------
    use Illuminate\Support\Str;


    $info="hi, lets learn laravel";
    // $info=Str::ucfirst($info);
    // $info=Str::replaceFirst("Hi","Sumit",$info);   //normally we are doing this.                                  
    // $info=Str::camel($info);
    // echo $info;
    we can replace the above into bellow [Method Chaining]
    -----------------------------------

    $info="hi, lets learn laravel";
    $info=Str::of($info)->ucfirst($info)
    ->replaceFirst("Hi","Sumit",$info);
    echo $info;

 --}}

*******Route Model Binding**********
************************************
{{--
    * Its means injecting Route And Model To fetch data in minimal code from database .
    
    web.php
    -----------
        key by default taken as id for different value we need to define in the routing page.
        Route::get('rmb/{key:name}',[DeviceController::class,'index']);

    
    DeviceController.php
    -------------------------
        function index(Device $key){

            // return $key;
            return $key->all();
        }

 --}}

 *******API lARAVEL**********
************************************
{{--
    * APPLICATION PROGRAMMING INTERFACE [JOSON FORMAT]
    ----------------------------------------
    * connect two technology and transfer data from one to another
    * for example react , view ,Angular, Android and others are unable to connect with database irectly


 --}}

 *******FIRST API IN lARAVEL**********
************************************
{{--
    make controller, make route, write small code , test API on postman
    --------------------------------------------------------------------
    dummyAPI.php  controller
    --------------- 
        function getData(){
            return ['name'=>'Sumit','email'=>'sumit@gmail.com','address'=>'Odisha'];
        }

    api.php
    ---------
        Route::get('data',[dummyAPI::class,'getData']);
 --}}