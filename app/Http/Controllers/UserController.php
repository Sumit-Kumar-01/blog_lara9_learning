<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    //
    function show($id){
        return "Hellom from controller :- ". $id;
    }


    function lodeview($id){
        return view('users',['user'=>$id]);
    }


    // function index(){
    //     return DB::select("select * from users");
    // }


    function index(){
        $data= Http::get("reqres.in/api/users?page=1");
        return view('users',['collection'=>$data['data']]);
    }

    function testRequest(Request $req){
        return $req->input();
        // echo "form Submited";
    }
}


