<section class="search-and-user">
        <div class="dropdown">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
        </form>

        <button onclick="openUserMenu()" class="user-menu">
            Logged in as:  {{auth()->user()->name}} <i onclick="openUserMenu()" class="fa fa-user"></i>
         </button>
            @csrf
            <div id="user-menu-dropdown" class="dropdown-content">
                    <button type="submit" value="LogOut">Log Out</button>
            </div>
      </div>
</section>
@push('scripts')
<script>

    function openUserMenu() {
        document.getElementById("user-menu-dropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
    if (!event.target.matches('.user-menu')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
    }
</script>
@endpush
