@extends('layouts.master')

@section('content')
<div>
    <section class="input-form">

       <form action="{{route('year.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="input-wrapper">
            <input type="number" name="year" placeholder="Enter Year"/>

          </div>
          <div class="store-btn-wrapper">
            <button class="btn add-btn" type="submit">Create New Year</button>
          </div>
       </form>
    </section>
</div>
@endsection
