<a href="{{route('movies.show',$movie->id)}}">
<div class="item" onclick="onMovie(event,{{$movie->id}})">
    <div class="img">
        <img src="{{url('storage/images/'.$movie->country->country_name.'/['.$movie->code_no.'].jpg')}}" alt="{{$movie->title}}" alt="">
    </div>
    <div class="info">
        <div class="title">{{$movie->title}}</div>
        <div class="status">
            <div class="type">Type: <span class="value">Movie</span></div>
            <div class="size">Size: <span class="value">{{$movie->file_size}} MB</span></div>
            <div class="size">Genre: 
                @foreach ($movie->tags as $tag)
                    <span class="value">{{$tag->tag_name}},</span>
                @endforeach
            </div>
            <div class="date">Year: <span class="value">{{$movie->year}} </span></div>
        </div>
    </div>
</div>
</a>