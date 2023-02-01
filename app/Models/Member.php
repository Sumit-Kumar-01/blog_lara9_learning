<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    // public $table='employee';
    public $timestamps=false;
    // public $fillable= [
    //     'name','email','address'
    // ];


    //Accessor
    // -----------

    // function getNameAttribute($value){
    //     return ucFirst($value.', India');
    // }

    // function getAddressAttribute($value){
    //     return $value.', India';
    // }


    //Mutator
    //---------------

    // public function setNameAttribute($value){
    //     return $this->attributes['name']='Mr. '.$value;
    // }

    // public function setAddressAttribute($value){
    //     return $this->attributes['address']=$value.", India";
    // }

}
