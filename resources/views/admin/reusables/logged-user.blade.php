<section class="search-and-user">
        <div class="dropdown">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf

        </form>

        <button onclick="openUserMenu()" class="user-menu">
            Logged in as:  {{auth()->user()->name}}
         </button>
            <div id="user-menu-dropdown" class="dropdown-content">
                    <button type="submit" onclick="logOut()" value="LogOut">Log Out</button>
            </div>
      </div>
</section>
@push('scripts')
<script>

    function openUserMenu() {
        document.getElementById("user-menu-dropdown").classList.toggle("show");
    }

    function logOut(){
        document.getElementById('logout-form').submit();
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
