<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Year;
use App\Country;
use App\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    //
    public function index(){
        $movies = Movie::with('tags')->orderBy('updated_at','desc')->paginate();
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
        if($request->movie_image) {
            $fileName ='['.$request->code_no.'].'.$request->movie_image->getClientOriginalExtension();
            $country = Country::find($request->country);
            $filePath = $request->file('movie_image')->storeAs('images/'.$country->country_name.'/', $fileName, 'public');


            $movie = Movie::create([
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

            $movie->tags()->attach($request->tags);

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
    public function edit(Movie $movie)
    {
        //
        $movie->load('tags');
        $years = Year::all();
        $countries = Country::all();
        $tags = Tag::all();

        return view('admin.movies.edit',compact('movie','years','countries','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //

        if($request->country!=$movie->country->id){
            $newCountry = Country::find($request->country);
            Storage::disk('public')->move('images/'.$movie->country->country_name.'/['.$movie->code_no.'].jpg','images/'.$newCountry->country_name.'/['.$movie->code_no.'].jpg');
        }

        $movie->update([
            'title'=>$request->title,
            'code_no'=>$request->code_no,
            'year'=>$request->year,
            'country_id'=>$request->country,
            'description'=>$request->description,
            'file_size'=>$request->file_size,
            'artist'=>$request->artists,
            'url'=>$request->trailer_url,
        ]);

        $movie->tags()->sync($request->tags);



        if($request->movie_image) {
            Storage::delete('['.$request->code_no.'].jpg');
            $fileName ='['.$request->code_no.'].jpg';
            $country = Country::find($request->country);
            $filePath = $request->file('movie_image')->storeAs('images/'.$country->country_name.'/', $fileName, 'public');
            $movie->update(['img_name'=>$fileName]);

        }
        return redirect(route('movie.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
        $movie->delete();
        return redirect()->back();
    }
}


