<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Year;
use App\Country;

class SeriesController extends Controller
{
    //
    public function index(){
        $series = Serie::paginate();
        return view('admin.series.index',compact('series'));
    }

    public function create()
    {
        //
        $years = Year::all();
        $countries = Country::all();

        return view('admin.series.new',compact('years','countries'));
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
            $fileName = time().'_'.$request->serie_image->getClientOriginalName();
            $filePath = $request->file('serie_image')->storeAs('images/series', $fileName, 'public');

            $tag = Serie::create([
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
    }
}
