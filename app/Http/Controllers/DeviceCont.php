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


        //POST METHOD API

        function add(Request $req){
            $device =new Device;
            $device->name=$req->name;
            $device->employee_id=$req->employee_id;
            $result=$device->save();
            if($result)
            {
                return ['result'=>'Data Has been saved'];

            }
            else{
                return ['result'=>'Operation Failed'];
            }
            // return ['result'=>'done'];
        }

        function update(Request $req){
            $device = Device::find($req->id);
            $device->name=$req->name;
            $device->employee_id=$req->employee_id;
            $result=$device->save();
            if($result)
            {
                return ['result'=>'Data Has been Updated'];

            }
            else{
                return ['result'=>'Operation Failed'];
            }

        }

        function delete($id){
            // return ['result'=>'Record has been deleted'.$id];

            $device = Device::find($id);
           $result= $device->delete();

           if($result)
            {
                return ['result'=>'Record has been deleted '.$id];

            }
            else{
                return ['result'=>'Operation Failed'];
            }
        }

        function search($name){
                return Device::where("name","like","%".$name."%")->get();
        }
}
