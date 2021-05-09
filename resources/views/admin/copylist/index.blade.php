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
       @foreach ($copyList as $copyItem)
            <tr>
                <td>{{$copyItem->user->name}}</td>
                <td>{{$copyItem->copyItems->count()}}</td>
                <td>
                    @foreach ($copyItem->copyItems as $copy)
                        <span class="code-item">{{$copy->copiable->code_no}}</span>
                    @endforeach
                </td>
                <td>{{$copyItem->created_at}}</td>
                <td>
                    @if($copyItem->status==\App\CopyOrderStatus::$PURCHASE_CONFIRMED)
                        <span class="purchased-label">Purchased at {{$copyItem->updated_at}} </span>
                    @else
                        <button class="confirm-purchase-btn">
                            <a href="{{route('copyorders.confirmPurchase',$copyItem)}}">Confirm Purchase</a>
                        </button>
                    @endif
                </td>
            </tr>
       @endforeach
    </table>
    <div class="pagination-wrapper">{{$copyList->links()}}</div>
</div>
@endsection
