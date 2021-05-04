<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Serie;
use App\Year;
use App\Country;
use App\Tag;
use App\Movie;
use App\CopyItem;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

trait CopyTrait
{

    function addToCopy($request,$type='movie',$copyId){
        return $request->auth()->user()->id;
        return CopyItem::create([
            'user_id'=>$request->auth()->user()->id,
            'type'=>$type,
            'copy_id'=>$copyId
        ]);
    }
}
