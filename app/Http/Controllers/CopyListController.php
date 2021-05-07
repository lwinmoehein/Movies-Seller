<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CopyItem;
use App\CopyOrder;

class CopyListController extends Controller
{
    //
    public function index(Request $request){
        $copyList = auth()->user()->copyOrders()->orderBy('updated_at','desc')->paginate(8);
        return view('admin.copylist.index',compact('copyList'));
    }
    public function destroy (CopyItem $copyItem){
        $copyItem->delete();
        return redirect()->back();
    }
}
