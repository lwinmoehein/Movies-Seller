<div class="cart-modal-wrapper">
    <!-- The Modal -->
    <div id="cart-modal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="header-wrapper"><span class="title">Added movies and series</span><span class="close"
                    onclick="onCloseClick()">&times;</span></div>
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
</div>
<div class="cart-section" onclick="onToggleCart()">
    <div class="add-to-cart">
        <i class="fa fa-shopping-cart"></i>
        <i class="added-count">{{ $copies->count() }}</i>
    </div>
</div>
@push('scripts')
    <script>
        function onToggleCart() {
            var modal = document.getElementById(`cart-modal`);
            var noRedirect = '.fa-trash, .fa-pencil';

            if (!event.target.matches(noRedirect)) {
                modal.style.display = "block";
            }
        }

        function onCloseClick() {
            let modals = document.getElementsByClassName('modal');
            for (var i = 0; i < modals.length; i++) {
                modals[i].style.display = "none";
            }
        }

    </script>
@endpush
