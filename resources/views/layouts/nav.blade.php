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
        <li>
            <a href="{{route('serie.index')}}">
                <svg>
                    <use xlink:href="#pages"></use>
                </svg>
                <span>Series</span>
            </a>
        </li>
        <li>
            <a href="{{route('movie.index')}}">
                <svg>
                    <use xlink:href="#users"></use>
                </svg>
                <span>Movies</span>
            </a>
        </li>
        <li>
            <a href="{{route('tag.index')}}">
                <svg>
                    <use xlink:href="#trends"></use>
                </svg>
                <span>Tags</span>
            </a>
        </li>
        <li>
            <a href="#0">
                <svg>
                    <use xlink:href="#collection"></use>
                </svg>
                <span>Additional Settings</span>
            </a>
        </li>

    </ul>
</nav>
