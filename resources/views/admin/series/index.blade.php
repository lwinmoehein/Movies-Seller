@extends('layouts.master')

@section('content')
<div class="series">
    @include('admin.reusables.logged-user')
    <form class="search-form" id="search-form" action="{{route('serie.index')}}" method="GET">
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
            <button class="btn add-btn"><a href="{{route('serie.create')}}">Create New Serie<i class="ml-2 fa fa-plus"></i></a></button>
            <div class="space"></div>
        </section>
    <section>
        @include('admin.reusables.filters',['years'=>$years,'countries'=>$countries,'categories'=>$categories])
    </section>
</form>

    <section class="serie-list">
       @foreach ($series as $serie)
           @include('admin.series.serie-item',$serie)
       @endforeach
    </section>
    <div class="pagination-wrapper"><div>{{$series->links()}}</div></div>
</div>
@endsection
@push('scripts')
    <script>
        function onFiltersChanged(){
            document.getElementById('search-form').submit();
        }

    </script>
@endpush
