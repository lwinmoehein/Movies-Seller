@extends('layouts.master')

@section('content')
<div>
    <section class="input-form">

       <form action="{{route('serie.update',$serie->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="input-wrapper">
            <input type="text" name="title" placeholder="Serie Title" value="{{$serie->title}}"/>
            <input type="text" name="code_no" placeholder="Serie Code No" value="{{$serie->code_no}}"/>
            <input type="number" name="file_size" placeholder="File Size (MB)" value="{{$serie->file_size}}"/>
            <textarea name="description" placeholder="Serie Description">{{$serie->detail}}</textarea>

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
            <input type="number" name="season_count" placeholder="Number of Seasons" value="{{$serie->season}}"/>
            <input type="number" name="episode_count" placeholder="Number of Episodes" value="{{$serie->episode}}"/>

            <input type="text" name="trailer_url" placeholder="Serie Trailer Url" value="{{$serie->url}}"/>
            <input type="file" name="serie_image" placeholder="Serie Image"/>

          </div>
          <div class="store-btn-wrapper">
            <button class="btn add-btn" type="submit">Edit Serie</button>
          </div>
       </form>
    </section>
</div>
@endsection
