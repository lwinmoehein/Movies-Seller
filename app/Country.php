<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public $table='countries';

    protected $fillable = ['country_name','country_img'];

}
