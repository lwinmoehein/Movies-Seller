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
use App\Http\Controllers\User\CopyTrait;

class MoviesController extends Controller
{
    //
    use CopyTrait;

    public function index(Request $request){
        $years =Year::all();
        $categories = Tag::all();



        $movies = Movie::query()->orderBy('updated_at','desc');
        if(isset($request->queryString)) {
            $queryString = $request->queryString;
            $movies = $movies->where('code_no', 'LIKE', "%{$queryString}%")
                            ->orWhere('title', 'LIKE', "%{$queryString}%");
        }
        if(isset($request->year_filter)){
            $movies = $movies->where('year',$request->year_filter);
        }
        if(isset($request->category_filter)){
            $categoryId = $request->category_filter;

            $movies = $movies->whereHas('tags',function($q) use ($categoryId){
                return $q->where('tags.id',$categoryId);
            });
        }
        $movies = $movies->paginate(6)->appends($request->input());
        session()->flashInput($request->input());

        return view('user.movies.index',compact('movies','years','categories'));
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
            'type'=>'movie',
            'copy_id'=>$request->movieId,
            'status'=>'ordered'
        ]);

        if($copyItem){
            return response()->json(['status'=>'success']);
        }
        return response()->json(['status'=>'failed']);
    }



}
