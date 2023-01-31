<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MembersController extends Controller
{
    function addData(Request $req){
        // $data =new Member;
        // $data -> name = $req->name;
        // $data -> email = $req->email;
        // $data -> address = $req->address;
        // $data->save();
        // return redirect('add');

        $data = $req->all();
        Member::create($data);
        return redirect('add');

    }
}
