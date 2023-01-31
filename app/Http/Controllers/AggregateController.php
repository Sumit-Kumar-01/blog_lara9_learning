<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AggregateController extends Controller
{
    //

    function operations(){
        // return DB::table('members')->get();

        //sum
        // return DB::table('members')->sum('id');

        //min
        // return DB::table('members')->min('id');

        //max
        return DB::table('members')->max('name');

        // avg
        // return DB::table('members')->avg('id');

    }
}
