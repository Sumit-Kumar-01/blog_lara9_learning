<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    function operations(){
        // $data= DB::table('members')->get();
        // return view('list1',['data'=>$data]);


        // return DB::table('members')
        // ->where('address','delhi')
        // ->get();


        // return (array)DB::table('members')->find(4);

        //  return DB::table('members')->count();

        // return DB::table('members')
        // ->insert([
        //     'name'=>'Sonu',
        //     'email'=>'sonu@gmail.com',
        //     'address'=>'cuttack'
        // ]);


        // return DB::table('members')
        // ->where('id',14)
        // ->update([
        //     'name'=>'Sonu b',
        //     'email'=>'sonu@gmail.com',
        //     'address'=>'cuttack'
        // ]);
        

        // return DB::table('members')
        // ->where('id',9)->delete();
      

    }
}
