@extends('layouts.master')

@section('content')
<div class="tags">
   @include('admin.reusables.logged-user')
    <table class="copylist-table">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>No: of Orders</th>
        </thead>
       @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->copies_count}}</td>
            </tr>
       @endforeach
    </table>
    <div class="pagination-wrapper">{{$users->links()}}</div>
</div>
@endsection
