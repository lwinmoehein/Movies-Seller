@extends('layouts.app')

@section('content')

<div class="item-detail">
    <div class="body">
        <div class="detail" style="background-image: url({{url('storage/images/Series/['.$serie->code_no.'].jpg')}})">
            <div class="info">
                <div>
                    Code: <span class="value">{{$serie->code_no}}</span>
                 </div>
                 <div>
                    Serie Title: <span class="value title">{{$serie->title}}</span>
                </div>
                <div>
                    Country: <span class="value">{{$serie->country->country_name??'N/A'}}</span>
                </div>
                <div>
                    Genre:
                    @foreach ($serie->tags as $tag)
                          <span class="value">{{$tag->tag_name}},</span>
                    @endforeach
                </div>
                <div>Series Status:
                     <span class="value artists">
                        {{$serie->complete_ongoing}}
                    </span>
                </div>
                <div>File Size: <span class="file-size value">{{$serie->file_size}} MB</span>
                </div>
                <div class="trailer-link">Trailer Link:
                      <a class="value" href="{{$serie->url}}">{{$serie->url}}</a>
                </div>
            </div>
          
        </div>
        <div class="actions-wrapper">
            @guest
                <button type="submit" class="add-btn disabled" >
                    <span>Login First To Add To Cart</span>
                </button>
            @else
            
                @if($serie->confirmedCopyItems && $serie->confirmedCopyItems->pluck('user_id')->contains(auth()->user()->id))
                    
                        <button type="submit" class="add-btn confirmed" >
                            <span>Wating to purchase<i class="fa fa-money"></i></span>
                        </button>
                 
                @elseif($serie->orderedCopyItems && $serie->orderedCopyItems->pluck('user_id')->contains(auth()->user()->id))
                    <form action="{{route('users.series.copyitems.destroy',$serie->id)}}" method="GET">
                        @csrf
                        <input type="hidden" value="{{$serie->id}}" name="movieId">
                        <button type="submit" class="add-btn added" >
                            <span>Added To Copy List<i class="fa fa-check"></i></span>
                        </button>
                    </form>
                @else
                    <form action="{{route('series.addToCopyList')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$serie->id}}" name="serieId">
                        <button type="submit" class="add-btn" >
                            <span>Add To Copy List<i class="fa fa-plus"></i></span>
                        </button>
                    </form>
                @endif
            @endguest
            
        </div>
        <div class="description">
            <div class="description-label">Description : <div class="description">
                {{$serie->detail??'N/A'}}</div></div>
        </div>
    </div>
</div>
@endsection