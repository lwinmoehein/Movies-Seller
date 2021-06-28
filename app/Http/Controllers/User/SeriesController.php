<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Serie;
use App\Year;
use App\Country;
use App\CopyItem;
use App\CopyItemStatus;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class SeriesController extends Controller
{
    //
    public function index(Request $request){
        $years =Year::orderBy('year','desc')->get();
        $categories = Tag::orderBy('tag_name')->get();
        $countries = Country::orderBy('country_name')->get();
        
        $copies = new Collection();

        if(auth()->user())
            $copies = auth()->user()->addedCopyItems;


        $series = Serie::query()->orderBy('updated_at','desc')->with('copyItems');
        if(isset($request->queryString)) {
            $queryString = $request->queryString;
            $series = $series->where('code_no', 'LIKE', "%{$queryString}%")
                            ->orWhere('title', 'LIKE', "%{$queryString}%");
        }
        if(isset($request->year_filter)){
            $series = $series->where('year',$request->year_filter);
        }
        if(isset($request->country_filter)){
            $countryId = $request->country_filter;
            $series = $series->whereHas('country',function($q) use ($countryId){
                $q->where('id',$countryId);
            });
        }
        if(isset($request->category_filter)){
            $categoryId = $request->category_filter;

            $series = $series->whereHas('tags',function($q) use ($categoryId){
                return $q->where('tags.id',$categoryId);
            });
        }
        $series = $series->paginate(6)->appends($request->input());
        session()->flashInput($request->input());

        return view('user.series.index',compact('series','years','categories','countries','copies'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        //
    }

    public function addCopyList(Request $request){

        $copyItem = CopyItem::create([
            'user_id'=>auth()->user()->id,
            'copiable_id'=>$request->serieId,
            'copiable_type'=>'App\Serie',
            'status'=>CopyItemStatus::ADDED_TO_LIST
        ]);

        if($copyItem){
            return redirect()->back();
        }
        return redirect()->back();
    }



}
