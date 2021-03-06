@extends('layouts.master')

@section('content')
<div class="tags">
   @include('admin.reusables.logged-user')
    <section class="tag-add-section mt-5">
        <button class="btn add-btn"><a href="{{route('tag.create')}}">Create New Tag<i class="ml-2 fa fa-plus"></i></a></button>
    </section>
    <section class="tag-list">
       @foreach ($tags as $tag)
            <div class="tag-item" style="background-image: url({{url('storage/images/tags/'.$tag->tag_img)}})">
                <div class="actions-wrapper"><a href="{{route('tags.destroy',$tag->id)}}"><i class="fa fa-trash"></i></a></div>
                <div class="tag-title">{{$tag->tag_name}}</div>
            </div>
       @endforeach
    </section>
    <div class="pagination-wrapper">{{$tags->links()}}</div>
</div>
@endsection
