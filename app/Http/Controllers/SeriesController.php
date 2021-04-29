<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class SeriesController extends Controller
{
    //
    public function index(){
        $series = Serie::paginate();
        return view('admin.series.index',compact('series'));
    }
}
