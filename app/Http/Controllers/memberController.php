<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

use function GuzzleHttp\Promise\all;

class memberController extends Controller
{
    //
    // function show(){
    //     $data= Member::all();
    //     return view('list',['members'=>$data]);
    // }


    function show(){
        $data= Member::paginate();
        return view('list',['members'=>$data]);
    }

    function delete($id){
        $data= Member::find($id);
        $data->delete();
        return redirect('list');
    }

    function showData($id){
        $data= Member::find($id);
        return view('edit',['data'=>$data]);
    }

    function update(Request $req){
        $data= Member::find($req->id);
        // $data->name=$req->name;
        // $data->address=$req->address;
        // $data->email=$req->email;
        // $data->save();

        $input = $req->all();
        $data->update($input);

        return redirect('list');
    }
}
