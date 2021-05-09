<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CopyItem;
use App\CopyOrder;
use App\CopyOrderStatus;

class CopyOrderController extends Controller
{
    //
    public function index(Request $request){
        $copyList = auth()->user()->copyOrders()->orderBy('created_at','desc')->paginate(8);
        return view('admin.copylist.index',compact('copyList'));
    }

    public function confirmPurchase(CopyOrder $copyOrder){
        $copyOrder->update([
            'status'=>CopyOrderStatus::$PURCHASE_CONFIRMED
        ]);
        return redirect()->back();
    }
}
