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
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Constraint\Count;

class MoviesController extends Controller
{
    //

    public function index(Request $request){
        $years =Year::all();
        $categories = Tag::all();
        $countries = Country::all();
        $copies = new Collection();

        if(auth()->user())
            $copies = auth()->user()->addedCopyItems;



        $movies = Movie::query()->orderBy('updated_at','desc');
        if(isset($request->queryString)) {
            $queryString = $request->queryString;
            $movies = $movies->where('code_no', 'LIKE', "%{$queryString}%")
                            ->orWhere('title', 'LIKE', "%{$queryString}%");
        }
        if(isset($request->year_filter)){
            $movies = $movies->where('year',$request->year_filter);
        }
        if(isset($request->country_filter)){
            $countryId = $request->country_filter;
            $movies = $movies->whereHas('country',function($q) use ($countryId){
                $q->where('id',$countryId);
            });
        }

        if(isset($request->category_filter)){
            $categoryId = $request->category_filter;

            $movies = $movies->whereHas('tags',function($q) use ($categoryId){
                return $q->where('tags.id',$categoryId);
            });
        }
        $movies = $movies->paginate(10)->appends($request->input());
        session()->flashInput($request->input());

        return view('user.movies.index',compact('movies','years','categories','countries','copies'));
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
            'copiable_id'=>$request->movieId,
            'copiable_type'=>'App\Movie',
            'status'=>CopyItemStatus::ADDED_TO_LIST
        ]);

        if($copyItem){
            return redirect()->back();
        }
        return redirect()->back();
    }



}
