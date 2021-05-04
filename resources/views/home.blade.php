@extends('layouts.app')

@section('content')
<div class="user-app">
  <div class="main-menu">
      <div class="series">
          <div class="title">Series <i class="fa fa-tv"></i></div>
          <div class="count">Total : <span>{{$seriesCount}}</span> series</div>

      </div>
      <div class="movies">
          <div class="title">Movies <i class="fa fa-film"></i></div>
          <div class="count">Total : <span>{{$moviesCount}}</span> movies</div>
      </div>
  </div>
</div>
@endsection
