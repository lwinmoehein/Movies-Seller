@extends('layouts.master')

@section('content')
<div>
    <section class="input-form">

       <form action="{{route('movie.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="input-wrapper">

            <input type="text" name="title" placeholder="Movie Title"/>
            <input type="text" name="code_no" placeholder="Movie Code No"/>
            <input type="number" name="file_size" placeholder="File Size (MB)"/>
            <textarea name="description" placeholder="Movie Description"></textarea>
            <input type="text" name="artists" placeholder="Movie Artists"/>
            <select name="country">
                @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
            </select>
            <select name="year">
                @foreach ($years as $year)
                    <option value="{{$year->year}}">{{$year->year}}</option>
                @endforeach
            </select>
            @foreach ($tags as $tag)
            @endforeach
            <input type="text" name="trailer_url" placeholder="Movie Trailer Url"/>
            <input type="file" name="movie_image" placeholder="Movie Image"/>

          </div>
          <div class="store-btn-wrapper">
            <button class="btn add-btn" type="submit">Create new Movie</button>
          </div>
       </form>
    </section>
</div>
@endsection
