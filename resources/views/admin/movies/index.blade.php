@extends('layouts.master')

@section('content')
<div class="movies">
    @include('admin.reusables.logged-user')
    <form class="search-form" id="search-form" action="{{route('movie.index')}}" method="GET">
        @csrf
    <section class="add-section">
        <div class="search-box-wrapper">

            <input type="text" name="queryString" value="{{old('queryString')??''}}" placeholder="Search by Code or Title">
            <button type="submit" aria-label="submit form">
                <svg aria-hidden="true">
                    <use xlink:href="#search"></use>
                </svg>
            </button>
        </div>
        <button class="btn add-btn"><a href="{{route('movie.create')}}">Create New Movie<i class="ml-2 fa fa-plus"></i></a></button>
        <div class="space"></div>
    </section>
    <section>
        <div class="filters">
            <div class="year-filter">
                <select name="year_filter"  onchange="onFiltersChanged()">
                    <option value="" selected>Year</option>
                    @foreach ($years as $year)
                        <option value="{{$year->year}}" {{old('year_filter')==$year->year?'selected':''}}>{{$year->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="country-filter">
                <select name="country_filter"  onchange="onFiltersChanged()">
                    <option value="" selected>Country</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}" {{old('country_filter')==$country->id?'selected':''}}>{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="category-filter">
                <select name="category_filter"  onchange="onFiltersChanged()">
                    <option value="" selected>Genre</option>
                @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{old('category_filter')==$category->id?'selected':''}}>{{$category->tag_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="right-space"></div>
        </div>
    </section>
    </form>
    <section class="serie-list">
       @foreach ($movies as $movie)
           @include('admin.movies.movie-item',$movie)
       @endforeach
    </section>
    <div class="pagination-wrapper"><div>{{$movies->links()}}</div></div>
</div>
@endsection
@push('scripts')
    <script>
        function onFiltersChanged(){
            document.getElementById('search-form').submit();
        }

    </script>
@endpush
