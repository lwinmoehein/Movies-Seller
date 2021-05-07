@extends('layouts.master')

@section('content')
<div class="tags">
   @include('admin.reusables.logged-user')
    <table class="copylist-table">
        <thead>
            <th>Requester Name</th>
            <th>No of Items</th>
            <th>Item Codes</th>
            <th>Copy request Date</th>

        </thead>
       @foreach ($copyList as $copyItem)
            <tr>
                {{-- <td>{{$copyItem->user->name}}</td>
                <td>{{explode('\\',$copyItem->copiable_type)[1]}}</td>
                <td>{{$copyItem->copiable->code_no}}</td>
                <th>
                    @foreach ($copyItem->copiable->tags as $tag)
                        <span>{{$tag->tag_name}},</span>
                    @endforeach
                </th>
                <td>{{$copyItem->copiable->title}}</td>
                <td>{{$copyItem->created_at}}</td> --}}
                <td>{{$copyItem->user->name}}</td>
                <td>{{$copyItem->copyItems->count()}}</td>
                <td>
                    @foreach ($copyItem->copyItems as $copy)
                        <span class="code-item">{{$copy->copiable->code_no}}</span>
                    @endforeach
                </td>
                <td>{{$copyItem->created_at}}</td>
            </tr>
       @endforeach
    </table>
    <div class="pagination-wrapper">{{$copyList->links()}}</div>
</div>
@endsection
