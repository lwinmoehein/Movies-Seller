<a href="{{route('series.show',$serie->id)}}">
<div class="item">
    <div class="img">
        <img src="{{url('storage/images/Series/['.$serie->code_no.'].jpg')}}" alt="">
    </div>
    <div class="info">
        <div class="title">{{$serie->title}}</div>
        <div class="status">
            <div class="type">Type: <span class="value">Series</span></div>
            <div class="size">Size: <span class="value">{{$serie->file_size}} MB</span></div>
            <div class="size">Episodes: <span class="value">{{$serie->episode}}</span></div>
            <div class="date">Year: <span class="value">{{$serie->year}} </span></div>
        </div>
    </div>
</div>
</a>