@extends('layouts.master')

@section('content')
<div>
    <section class="input-form">

       <form action="{{route('country.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="input-wrapper">
            <input type="text" name="country_name" placeholder="Country Name"/>
            <input type="file" name="country_image" placeholder="Country Image"/>

          </div>
          <div class="store-btn-wrapper">
            <button class="btn add-btn" type="submit">Create new Country</button>
          </div>
       </form>
    </section>
</div>
@endsection
