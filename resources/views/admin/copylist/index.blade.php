@extends('layouts.master')

@section('content')
<div class="tags">
   @include('admin.reusables.logged-user')
    <table class="copylist-table">
        <thead>
            <th>UserName</th>
            <th>Type</th>
            <th>Code No</th>
            <th>Date</th>
        </thead>
       @foreach ($copyList as $copyItem)
            <tr>
                <td>{{$copyItem->user->name}}</td>
                <td>{{explode('\\',$copyItem->copiable_type)[1]}}</td>
                <td>{{$copyItem->copiable->code_no}}</td>
                <td>{{$copyItem->created_at}}</td>
            </tr>
       @endforeach
    </table>
    <div class="pagination-wrapper">{{$copyList->links()}}</div>
</div>
@endsection
