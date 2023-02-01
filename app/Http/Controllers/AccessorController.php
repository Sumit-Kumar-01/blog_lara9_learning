<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class AccessorController extends Controller
{
    //

    function ind(){
        return Member::all();
    }
}
