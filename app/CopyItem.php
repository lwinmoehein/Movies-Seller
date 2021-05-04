<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopyItem extends Model
{
    //
    public $table = 'copyable';

    protected $fillable = [
        'status','user_id','copiable_id','copiable_type'
    ];

    function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function copiable(){
        return $this->morphTo();
    }
}
