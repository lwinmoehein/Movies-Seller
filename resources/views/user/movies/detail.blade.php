@extends('layouts.app')

@section('content')

<div class="item-detail">
    <div class="body">
        <div class="detail" style="background-image: url({{url('storage/images/'.$movie->country->country_name.'/['.$movie->code_no.'].jpg')}}" alt="{{$movie->title}})">
            <div class="info">
                <div>
                    Code: <span class="value">{{$movie->code_no}}</span>
                 </div>
                 <div>
                    Movie Title: <span class="value title">{{$movie->title}}</span>
                </div>
                <div>
                    Country: <span class="value">{{$movie->country->country_name}}</span>
                </div>
                <div>
                    Genre:
                    @foreach ($movie->tags as $tag)
                          <span class="value">{{$tag->tag_name}},</span>
                    @endforeach
                </div>
                <div>
                    Artists: <span class="value">{{$movie->artist}}</span>
                </div>
                
                <div>File Size: <span class="file-size value">{{$movie->file_size}} MB</span>
                </div>
                <div class="trailer-link">Trailer Link:
                      <a class="value" href="{{$movie->url}}">{{$movie->url}}</a>
                </div>
            </div>
          
        </div>
        <div class="actions-wrapper">
            @guest
                <button type="submit" class="add-btn disabled" >
                    <span>Login First To Add To Cart</span>
                </button>
            @else
            
                @if($movie->confirmedCopyItems && $movie->confirmedCopyItems->pluck('user_id')->contains(auth()->user()->id))
                    
                        <button type="submit" class="add-btn confirmed" >
                            <span>Wating to purchase<i class="fa fa-money"></i></span>
                        </button>
                 
                @elseif($movie->orderedCopyItems && $movie->orderedCopyItems->pluck('user_id')->contains(auth()->user()->id))
                    <form action="{{route('users.movies.copyitems.destroy',$movie->id)}}" method="GET">
                        @csrf
                        <input type="hidden" value="{{$movie->id}}" name="movieId">
                        <button type="submit" class="add-btn added" >
                            <span>Added To Copy List<i class="fa fa-check"></i></span>
                        </button>
                    </form>
                @else
                    <form action="{{route('movies.addToCopyList')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$movie->id}}" name="movieId">
                        <button type="submit" class="add-btn" >
                            <span>Add To Copy List<i class="fa fa-plus"></i></span>
                        </button>
                    </form>
                @endif
            @endguest
            
        </div>
        <div class="description">
            <div class="description-label">Description : <div class="description">
                {{$movie->description??'N/A'}}</div></div>
        </div>
    </div>
</div>
@endsection