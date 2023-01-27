<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function show($id){
        return "Hellom from controller :- ". $id;
    }


    function lodeview($id){
        return view('users',['user'=>$id]);
    }
}


