<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CopyItem;
use App\CopyItemStatus;
use App\CopyOrder;
use App\CopyOrderStatus;

class CopyOrderController extends Controller
{
    //
    public function index(Request $request){
        $copyList = CopyOrder::orderBy('created_at','desc')->paginate(8);
        return view('admin.copylist.index',compact('copyList'));
    }

    public function confirmPurchase(CopyOrder $copyOrder){
        $copyOrder->update([
            'status'=>CopyOrderStatus::PURCHASE_CONFIRMED
        ]);

        $copyOrder->copyItems()->update([
            'status'=>CopyItemStatus::CONFIRMED_PURCHASE
        ]);

        return redirect()->back();
    }
}
