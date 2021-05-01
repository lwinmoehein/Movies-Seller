<div class="serie-item" style="background-image: url({{url('storage/images/Series/['.$serie->code_no.'].jpg')}})">
    <div class="title"><span>[{{$serie->code_no}}]</span> {{$serie->title}}</div>
    <div class="actions">
        <a href="{{route('serie.destroy',$serie->id)}}"><i class="fa fa-trash"></i></a>
        <a href="{{route('serie.edit',$serie->id)}}"><i class="fa fa-pencil"></i></a>
    </div>
    <div class="info">
        <div class="season">Status:<span>{{$serie->complete_ongoing}}</span></div>
        <div class="year">Year:<span>{{$serie->year??'N/A'}}</span></div>
    </div>
</div>
