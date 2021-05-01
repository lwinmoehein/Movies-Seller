@extends('layouts.master')

@section('content')
<div class="series">
    <section class="search-and-user">
        <div class="admin-profile">
            <span class="greeting">Hello admin</span>
            <div class="notifications">
                <span class="badge">1</span>
                <svg>
                    <use xlink:href="#users"></use>
                </svg>
            </div>
        </div>
    </section>
    <section class="add-section">
        <form class="search-form" action="{{route('serie.index')}}" method="GET">
            @csrf
            <div class="search-box-wrapper">

                <input type="text" name="queryString" value="{{old('queryString')??''}}" placeholder="Search by Code or Title">
                <button type="submit" aria-label="submit form">
                    <svg aria-hidden="true">
                        <use xlink:href="#search"></use>
                    </svg>
                </button>
            </div>
        </form>
        <button class="btn add-btn"><a href="{{route('serie.create')}}">Create New Serie<i class="ml-2 fa fa-plus"></i></a></button>
        <div class="space"></div>
    </section>
    <section class="serie-list">
       @foreach ($series as $serie)
           @include('admin.series.serie-item',$serie)
       @endforeach
    </section>
    <div class="pagination-wrapper"><div>{{$series->links()}}</div></div>
</div>
@endsection
