<nav>
    <a href="#0" aria-label="forecastr logo" class="logo">
        <svg width="140" height="49">
            <use xlink:href="#logo"></use>
        </svg>
    </a>
    <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
        <svg width="20" height="20" aria-hidden="true">
            <use xlink:href="#down"></use>
        </svg>
    </button>
    <ul class="admin-menu">
        <li class="menu-heading">
            <h3>Admin Panel</h3>
        </li>
        <li class="{{Route::is('serie.index')|| Route::is('index')?'link-active':''}}">
            <a href="{{route('serie.index')}}">
                <i class="fa fa-tv"></i>
                <span>Series</span>
            </a>
        </li>
        <li class="{{Route::is('movie.index')?'link-active':''}}">
            <a href="{{route('movie.index')}}" >
                <i class="fa fa-film"></i>
                <span>Movies</span>
            </a>
        </li>
        <li class="{{Route::is('tag.index')?'link-active':''}}">
            <a href="{{route('tag.index')}}"  >
                <i class="fa fa-tags"></i>
                <span>Tags</span>
            </a>
        </li>
        <li class="{{Route::is('country.index')?'link-active':''}}">
            <a href="{{route('country.index')}}" >
                <i class="fa fa-globe"></i>
                <span>Countries</span>
            </a>
        </li>
        <li class="{{Route::is('year.index')?'link-active':''}}">
            <a href="{{route('year.index')}}" >
                <i class="fa fa-calendar"></i>
                <span>Years</span>
            </a>
        </li>
        <li class="{{Route::is('copyitems.index')?'link-active':''}}">
            <a href="{{route('copyitems.index')}}" >
                <i class="fa fa-file"></i>
                <span>Copy Orders</span>
            </a>
        </li>
        <li class="{{Route::is('users.index')?'link-active':''}}">
            <a href="{{route('users.index')}}" >
                <i class="fa fa-user"></i>
                <span>Users</span>
            </a>
        </li>


    </ul>
</nav>
