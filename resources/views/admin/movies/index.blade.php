@extends('layouts.master')

@section('content')
<div class="movies">

    <section class="search-and-user">
        <form>
            <input type="search" placeholder="Search Pages...">
            <button type="submit" aria-label="submit form">
                <svg aria-hidden="true">
                    <use xlink:href="#search"></use>
                </svg>
            </button>
        </form>
        <div class="admin-profile">
            <span class="greeting">Hello admin</span>
            <div class="notifications">
                <span class="badge">1</span>
                <svg>
                    <use xlink:href="#users"></use>
                </svg>
            </div>
        </div>
    </section>
    <section class="add-section">
        <button class="btn add-btn"><a href="{{route('movie.create')}}">Create New Movie<i class="ml-2 fa fa-plus"></i></a></button>
    </section>
    <section class="movie-list">
       @foreach ($movies as $movie)
       {{$movie->img_name}}
            <div class="movie-item" >
                <div class="title">
                    <img src="{{url('storage/images/'.$movie->country->country_name.'/['.$movie->code_no.'].jpg')}}" alt="{{$movie->title}}" width="100px" height="100px">
                </div>
            </div>
       @endforeach
    </section>
    <div class="pagination-wrapper"><div>{{$movies->links()}}</div></div>
</div>
@endsection
