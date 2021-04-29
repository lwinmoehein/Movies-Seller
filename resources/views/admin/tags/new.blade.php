@extends('layouts.master')

@section('content')
<div>
    <section class="input-form">
       <form action="{{route('tag.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="input-wrapper">
            <input type="text" name="tag_name" placeholder="Genre Name"/>
            <input type="file" name="tag_image" placeholder="Genre Image"/>
            <input type="submit" value="Create New Genre"/>
          </div>

       </form>
    </section>
</div>
@endsection
