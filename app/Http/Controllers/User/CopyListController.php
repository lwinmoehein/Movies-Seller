<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Serie;
use App\Year;
use App\Country;
use App\Tag;
use App\Movie;
use App\CopyItem;
use App\CopyItemStatus;
use App\CopyOrder;
use App\CopyOrderStatus;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\CopyTrait;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Constraint\Count;
use App\User;
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
        $copyItems = CopyItem::where('user_id',auth()->user()->id)->where('status',CopyItemStatus::ADDED_TO_LIST)->get();
        $updatedCopyItems = CopyItem::where('user_id',auth()->user()->id)->where('status',CopyItemStatus::ADDED_TO_LIST)->update(['status'=>CopyItemStatus::CONFIRMED_ORDER]);
        $copyOrder = new CopyOrder();
        $copyOrder->user_id=auth()->user()->id;
        $copyOrder->status = CopyOrderStatus::ORDERED;
        $copyOrder->save();

        $copyOrder->copyItems()->attach($copyItems->pluck('id'));

        return redirect()->back();
    }
    public function movieCopyDestroy(Movie $movie){
        $user = auth()->user();
        $status=CopyItem::where('user_id',$user->id)->where('copiable_type','App\Movie')->where('copiable_id',$movie->id)->delete();
        return redirect()->back();
    }
    public function serieCopyDestroy(Serie $serie){
        $user = auth()->user();
        $status=CopyItem::where('user_id',$user->id)->where('copiable_type','App\Serie')->where('copiable_id',$serie->id)->delete();
        return redirect()->back();
    }

    public function cart(User $user){
        $copies = new Collection();
        if(auth()->user())
            $copies = auth()->user()->addedCopyItems;

        return view('user.reusables.cart',compact('copies'));
    }
}
