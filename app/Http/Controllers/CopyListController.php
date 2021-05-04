<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CopyItem;

class CopyListController extends Controller
{
    //
    public function index(Request $request){
        $copyList = CopyItem::orderBy('updated_at','desc')->with('copiable')->paginate(8);
        return view('admin.copylist.index',compact('copyList'));
    }
}
