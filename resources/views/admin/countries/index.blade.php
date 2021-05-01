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
        <button class="btn add-btn"><a href="{{route('country.create')}}">Create New Country<i class="ml-2 fa fa-plus"></i></a></button>
    </section>
    <section class="country-list">
       @foreach ($countries as $country)
            <div class="country-item" style="background-image: url({{url('storage/images/countries/'.$country->country_img)}})">
               <div> {{$country->country_name}}</div><a href="{{route('countries.destroy',$country->id)}}"><i class="fa fa-trash"></i></a>
            </div>
       @endforeach
    </section>
</div>
@endsection
