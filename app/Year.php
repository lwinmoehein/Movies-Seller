<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    //
    public $table='years';

    protected $fillable= ['year'];
}
