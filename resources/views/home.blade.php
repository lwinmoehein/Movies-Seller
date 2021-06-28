@extends('layouts.app')

@section('content')
<div class="user-app">
  <div class="main-menu">
      <a href="{{route('series.index')}}">
        <div class="series">
            <div class="title">Series <i class="fa fa-tv"></i></div>
        </div>
      </a>
      <a href="{{route('movies.index')}}">
        <div class="movies">
            <div class="title">Movies <i class="fa fa-film"></i></div>
        </div>
      </a>

  </div>
</div>
@endsection

