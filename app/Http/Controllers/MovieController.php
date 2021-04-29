<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Year;
use App\Country;
use App\Tag;

class MovieController extends Controller
{
    //
    public function index(){
        $movies = Movie::paginate();
        return view('admin.movies.index',compact('movies'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $years = Year::all();
        $countries = Country::all();
        $tags = Tag::all();

        return view('admin.movies.new',compact('years','countries','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->tags);
        if($request->movie_image) {
            $fileName = time().'_'.$request->movie_image->getClientOriginalName();
            $filePath = $request->file('movie_image')->storeAs('images/movies', $fileName, 'public');

            $tag = Movie::create([
                'title'=>$request->title,
                'code_no'=>$request->code_no,
                'img_name'=>$fileName,
                'year'=>$request->year,
                'country_id'=>$request->country,
                'description'=>$request->description,
                'file_size'=>$request->file_size,
                'artist'=>$request->artists,
                'url'=>$request->trailer_url,
            ]);

            return redirect(route('movie.index'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $tag)
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
    public function update(Request $request, Movie $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $tag)
    {
        //
    }
}


