@extends('layouts.master')

@section('content')
<div class="country">
    @include('admin.reusables.logged-user')
    <section class="country-add-section mt-5">
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
