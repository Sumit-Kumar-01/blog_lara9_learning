<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    function loadview(){
        // $data=['sumit','sambit','rahul','bablu','sonu'];
        // return view('users',['data'=>$data]);
        return view('users',['name'=>'sumi']);

    }


    function getData(Request $req){
        return $req->input();

    }
}
