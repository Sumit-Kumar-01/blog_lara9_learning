<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MutatorController extends Controller
{
    //
    function ind(){
        $data=new Member;
        $data->name="Sumit";
        $data->email="xyz@test.com";
        $data->address="Mumbai";
        $data->save();

    }
}
