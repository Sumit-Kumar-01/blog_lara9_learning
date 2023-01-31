<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //
    function userLogin(Request $req){
            $data= $req->input('user');
            $req->session()->put('user',$data);
            // echo session('user');
            return redirect('profile');
    }
}
