<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Serie;
use App\Year;
use App\Country;
use App\Tag;
use App\Movie;
use App\CopyItem;
use App\CopyOrder;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\CopyTrait;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Constraint\Count;

class CopyListController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function destroy(CopyItem $copyitem){
        $copyitem->delete();
        return redirect()->back();
    }

    public function confirmOrder(Request $request){
        $copyItems = CopyItem::where('user_id',auth()->user()->id)->where('status','ordered')->get();
        $updatedCopyItems = CopyItem::where('user_id',auth()->user()->id)->where('status','ordered')->update(['status'=>'confirmed']);
        $copyOrder = new CopyOrder();
        $copyOrder->user_id=auth()->user()->id;
        $copyOrder->save();

        $copyOrder->copyItems()->attach($copyItems->pluck('id'));

        return redirect()->back();
    }
}
