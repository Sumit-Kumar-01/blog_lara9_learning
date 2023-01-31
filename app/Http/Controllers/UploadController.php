<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UploadController extends Controller
{
    //
    function upload(Request $req){
            return $req->file('file')->store('img');
    }
}
