<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class OnetoManyController extends Controller
{
    //

    function index(){
        return Employee::find(2)->deviceData;
    }
}
