@extends('layouts.master')

@section('content')
<div>
    <section class="input-form">

       <form action="{{route('serie.update',$serie->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="input-wrapper">
            <input type="text" name="title" placeholder="Serie Title" value="{{$serie->title}}"/>
            <input type="text" name="code_no" placeholder="Serie Code No" disabled value="{{$serie->code_no}}"/>
            <input type="number" name="file_size" placeholder="File Size (MB)" value="{{$serie->file_size}}"/>
            <textarea name="description" placeholder="Serie Description">{{$serie->detail}}</textarea>

            <select name="country">
                @foreach ($countries as $country)
                    <option value="{{$country->id}}" {{$serie->country_id==$country->id?'selected':''}}>{{$country->country_name}}</option>
                @endforeach
            </select>
            <select name="year">
                @foreach ($years as $year)
                    <option value="{{$year->year}}" {{$serie->year==$year->year?'selected':''}}>{{$year->year}}</option>
                @endforeach
            </select>
            <select name="status">
                <option value="Complete" {{$serie->complete_ongoing=='Complete'?'selected':''}}>Complete</option>
                <option value="Ongoing" {{$serie->complete_ongoing=='Ongoing'?'selected':''}} >Ongoing</option>
            </select>
            <input type="number" name="season_count" placeholder="Number of Seasons" value="{{$serie->season}}"/>
            <input type="number" name="episode_count" placeholder="Number of Episodes" value="{{$serie->episode}}"/>

            <input type="text" name="trailer_url" placeholder="Serie Trailer Url" value="{{$serie->url}}"/>
            <input type="file" name="serie_image" placeholder="Serie Image" placeholder="Movie Image" accept="image/*" onchange="loadFile(event)"/>
            <img width="200px" height="250px" src="{{url('storage/images/Series/['.$serie->code_no.'].jpg')}}" class="preview-image" alt="Poster Preview" id="preview_image">
          </div>
          <p>Tagged categories:</p>

          <div class="category-wrapper">
              @foreach ($tags as $tag)
                  <div>
                      <input type="checkbox" value="{{$tag->id}}" id="{{$tag->id}}" {{$serie->tags->contains($tag->id)?'checked':''}} name="tags[]"
                          >
                      <label for="{{$tag->id}}">{{$tag->tag_name}}</label>
                  </div>
              @endforeach
          </div>
          </div>
          <div class="store-btn-wrapper">
            <button class="btn add-btn" type="submit">Edit Serie</button>
          </div>
       </form>
    </section>
</div>
@endsection
@push('scripts')

<script>
        var loadFile = function(event) {
      var output = document.getElementById('preview_image');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };


</script>

@endpush
