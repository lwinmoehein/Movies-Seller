@extends('layouts.master')

@section('content')
<div class="tags">
    <section class="search-and-user">
        <form>
            <input type="search" placeholder="Search Pages...">
            <button type="submit" aria-label="submit form">
                <svg aria-hidden="true">
                    <use xlink:href="#search"></use>
                </svg>
            </button>
        </form>
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
        <button class="btn add-btn"><a href="{{route('tag.create')}}">Create New Tag<i class="ml-2 fa fa-plus"></i></a></button>
    </section>
    <section class="tag-list">
       @foreach ($tags as $tag)
            <div class="tag-item">
                <div>
                <img src="{{url('storage/images/tags/'.$tag->tag_img)}}" alt="">
                </div>
                <div class="tag-title">{{$tag->tag_name}}</div>

            </div>
       @endforeach
    </section>
    <div class="pagination-wrapper">{{$tags->links()}}</div>
</div>
@endsection
