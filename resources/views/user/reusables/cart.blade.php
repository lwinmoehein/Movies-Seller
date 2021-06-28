@extends('layouts.app')

@section('content')
<div class="mt-5">
        <div class="cart-content">
            <div class="header-wrapper"><span class="title">Added movies and series</span></div>
            <div class="body">
                @forelse ($copies as $key => $copy)
                    <div class="item">
                        <div>
                            {{ ++$key }}
                        </div>
                        <div>{{ $copy->copiable->code_no }}</div>
                        <div>{{ $copy->copiable->title }}</div>
                        <div>
                            <a href="{{ route('users.copyitems.destroy', $copy->id) }}"> 
                                <i class="fa fa-trash"></i>
                            </a>

                        </div>
                    </div>
                @empty
                    <div>
                        No Movies and Series Found in cart
                    </div>
                @endforelse
            </div>
            @if($copies->count()>0)
                <div class="confirm-section">
                    <a href="{{ route('users.copyitems.confirm') }}"> 
                    Confirm Order   <i class="fa fa-check"></i>
                    </a>
                </div>
            @endif
        </div>
</div>
@endsection


