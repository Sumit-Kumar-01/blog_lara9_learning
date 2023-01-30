<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    function show($id){
        return "Hellom from controller :- ". $id;
    }


    function lodeview($id){
        return view('users',['user'=>$id]);
    }


    function index(){
        echo DB::select("select * from user");
    }
}


