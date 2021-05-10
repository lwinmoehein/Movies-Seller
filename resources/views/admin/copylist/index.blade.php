@extends('layouts.master')

@section('content')
<div class="copy-orders">
   @include('admin.reusables.logged-user')
    <table class="copylist-table">
        <thead>
            <th>Requester Name</th>
            <th>No of Items</th>
            <th>Item Codes</th>
            <th>Copy request Date</th>
            <th>Actions</th>

        </thead>
       @foreach ($copyList as $copyOrder)
            <tr>
                <td>{{$copyOrder->user->name}}</td>
                <td>{{$copyOrder->copyItems->count()}}</td>
                <td>
                    @foreach ($copyOrder->copyItems as $copy)
                        <span class="code-item {{$copy->copiable_type=='App\Movie'?'movie':'serie'}}">{{$copy->copiable->code_no}}</span>,
                    @endforeach
                </td>
                <td>{{$copyOrder->created_at}}</td>
                <td>
                    @if($copyOrder->status==\App\CopyOrderStatus::PURCHASE_CONFIRMED)
                        <span class="purchased-label">Purchased at {{$copyOrder->updated_at}} </span>
                    @else
                        <button class="confirm-purchase-btn">
                            <a href="{{route('copyorders.confirmPurchase',$copyOrder)}}">Confirm Purchase</a>
                        </button>
                    @endif
                </td>
            </tr>
       @endforeach
    </table>
    <div class="pagination-wrapper">{{$copyList->links()}}</div>
</div>
@endsection
