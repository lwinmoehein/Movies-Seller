<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Year;
use App\Country;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class SeriesController extends Controller
{
    //
    public function index(Request $request){
        $series = Serie::query()->orderBy('updated_at','desc');
        if(isset($request->queryString)) {
            $queryString = $request->queryString;
            $series = $series->where('code_no', 'LIKE', "%{$queryString}%")
                            ->orWhere('title', 'LIKE', "%{$queryString}%");
        }
        $series = $series->paginate()->appends($request->input());
        session()->flashInput($request->input());

        return view('admin.series.index',compact('series'));
    }

    public function create()
    {
        //
        $years = Year::all();
        $countries = Country::all();
        $tags = Tag::all();

        return view('admin.series.new',compact('years','countries','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->serie_image) {
            $fileName = '['.$request->code_no.'].jpg';
            $filePath = $request->file('serie_image')->storeAs('images/Series', $fileName, 'public');

            $serie = Serie::create([
                'title'=>$request->title,
                'code_no'=>$request->code_no,
                'poster'=>$fileName,
                'year'=>$request->year,
                'country_id'=>$request->country,
                'detail'=>$request->description,
                'file_size'=>$request->file_size,
                'url'=>$request->trailer_url,
                'season'=>$request->season_count,
                'episode'=>$request->episode_count,
                'complete_ongoing'=>$request->status
            ]);
            if(isset($request->tags))
                $serie->tags()->attach($request->tags);

            return redirect(route('serie.index'));
        }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie)
    {
        //
        $serie->load('tags');

        $years = Year::all();
        $countries = Country::all();
        $tags = Tag::all();

        return view('admin.series.edit',compact('serie','years','countries','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie)
    {
        //

        $serie->update([
            'title'=>$request->title,
            'year'=>$request->year,
            'country_id'=>$request->country,
            'detail'=>$request->description,
            'file_size'=>$request->file_size,
            'url'=>$request->trailer_url,
            'season'=>$request->season_count,
            'episode'=>$request->episode_count,
            'complete_ongoing'=>$request->status
        ]);

        if(isset($request->tags))
            $serie->tags()->sync($request->tags);


        if($request->serie_image) {
            Storage::delete('['.$serie->code_no.'].jpg');
            $fileName = '['.$serie->code_no.'].jpg';
            $filePath = $request->file('serie_image')->storeAs('images/Series', $fileName, 'public');
            $serie->update(['poster',$fileName]);
        }
        return redirect(route('serie.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie)
    {
        //

        $serie->delete();
        return redirect()->back();
    }

}
