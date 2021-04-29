@extends('layouts.master')

@section('content')
<div>
    <section class="input-form">

       <form action="{{route('serie.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="input-wrapper">
            <input type="text" name="title" placeholder="Serie Title"/>
            <input type="text" name="code_no" placeholder="Serie Code No"/>
            <input type="number" name="file_size" placeholder="File Size (MB)"/>
            <textarea name="description" placeholder="Serie Description"></textarea>

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
            <select name="status">
                <option value="Complete">Complete</option>
                <option value="Ongoing">Ongoing</option>
            </select>
            <input type="number" name="season_count" placeholder="Number of Seasons"/>
            <input type="number" name="episode_count" placeholder="Number of Episodes"/>

            <input type="text" name="trailer_url" placeholder="Serie Trailer Url"/>
            <input type="file" name="serie_image" placeholder="Serie Image"/>

          </div>
          <div class="store-btn-wrapper">
            <button class="btn add-btn" type="submit">Create new Movie</button>
          </div>
       </form>
    </section>
</div>
@endsection
