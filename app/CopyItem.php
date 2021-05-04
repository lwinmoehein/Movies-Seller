<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopyItem extends Model
{
    //
    public $table = 'copy_list';

    protected $fillable = [
        'copy_id','user_id','type','status'
    ];
}
