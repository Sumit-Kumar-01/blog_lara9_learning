<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    function getData(){
        return DB::table('employee')
        ->join('company','employee.id','=','company.employee_id')
        ->select('company.*','employee.*')
        ->where('employee.name','sonu')
        ->get();
    }
}
