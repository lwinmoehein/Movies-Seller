<div class="cart-section">
    <a href="{{route('cart')}}">
        <div class="add-to-cart">
            <i class="fa fa-shopping-cart"></i>
            <i class="added-count">{{ $copies->count() }}</i>
        </div>
    </a>
</div>