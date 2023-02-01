<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    //
    function getData(){
        return ['name'=>'Sumit','email'=>'sumit@gmail.com','address'=>'Odisha'];
    }
}
