<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopyOrder extends Model
{
    //
    public $table = 'copy_orders';

    protected $fillable = ['copy_item_id','copy_order_id','user_id','status'];

    function copyItems(){
        return $this->belongsToMany('App\CopyItem','copy_orders_items','copy_item_id','copy_order_id');
    }
    function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
