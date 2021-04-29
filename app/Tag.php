<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public $table='tags';

    protected $fillable = ['tag_name','tag_img'];
}
