@extends('layouts.master')

@section('content')
<div class="country">
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
    <section class="country-add-section">
        <button class="btn add-btn"><a href="{{route('year.create')}}">Create New Year<i class="ml-2 fa fa-plus"></i></a></button>
    </section>
    <section class="country-list">
       @foreach ($years as $year)
            <div class="country-item">
               <div> {{$year->year}}</div><a href="{{route('years.destroy',$year->id)}}"><i class="fa fa-trash"></i></a>
            </div>
       @endforeach
    </section>
    <div class="pagination-wrapper">{{$years->links()}}</div>
</div>
@endsection
