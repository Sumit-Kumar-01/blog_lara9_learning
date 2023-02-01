<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class OnetoOneController extends Controller
{
    //
    function index(){
        return Employee::find(2)->companyData;
    }
}
