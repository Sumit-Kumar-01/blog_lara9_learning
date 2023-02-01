<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // One To One
    function companyData(){
        return $this->hasOne('App\Models\Company');
    }

    // One To Many

    function deviceData(){
        return $this->hasMany('App\Models\Device');
    }
}
