@extends('layouts.app')

@section('content')
<div class="user-app">
    <div class="filter-wrapper">
        <form class="search-form" id="search-form" action="{{route('series.index')}}" method="GET">
            @csrf
            <div class="search-box-wrapper">

                <input type="text" name="queryString" value="{{old('queryString')??''}}" placeholder="Search by Serie Code or Title">
                <button type="submit" aria-label="submit form">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            @include('user.reusables.filters',['years'=>$years,'countries'=>$countries,'categories'=>$categories])

         </form>

    </div>
    <div class="items-list">
        @foreach ($series as $serie)
           @include('user.series.serie-item',$serie)
        @endforeach
    </div>
    <div class="pagination-wrapper">
        {{$series->onEachSide(1)->links()}}
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function onFiltersChanged(){
            document.getElementById('search-form').submit();
        }
    
    </script>
@endpush
