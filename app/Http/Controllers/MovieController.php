<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    //
    public function index(){
        $movies = Movie::paginate();
        return view('admin.movies.index',compact('movies'));
    }
}
