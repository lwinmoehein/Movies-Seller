@extends('layouts.app')

@section('content')
<div class="user-app">
    <div class="filter-wrapper">
        <form class="search-form" id="search-form" action="{{route('movies.index')}}" method="GET">
            @csrf
            <div class="search-box-wrapper">

                <input type="text" name="queryString" value="{{old('queryString')??''}}" placeholder="Search by Code or Title">
                <button type="submit" aria-label="submit form">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="filters">
                <div class="year-filter">
                    <select name="year_filter"  onchange="onFiltersChanged()">
                        <option value="" selected>Filter by Year</option>
                        @foreach ($years as $year)
                            <option value="{{$year->year}}" {{old('year_filter')==$year->year?'selected':''}}>{{$year->year}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="category-filter">
                    <select name="category_filter"  onchange="onFiltersChanged()">
                        <option value="" selected>Filter by Genre</option>
                    @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category_filter')==$category->id?'selected':''}}>{{$category->tag_name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
         </form>

    </div>
    <div class="items-list">
        @foreach ($movies as $movie)
           @include('user.movies.movie-item',$movie)
        @endforeach
    </div>
    <div class="pagination-wrapper">
        {{$movies->onEachSide(1)->links()}}
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
