<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceCont extends Controller
{
    
    function list($id=null){
        return $id?Device::find($id):Device::all();
    }

        //     function list(){
        //         return Device::all();
        //     }
        //     function listparam($id){
        //         return Device::find($id);
        //     }


}
