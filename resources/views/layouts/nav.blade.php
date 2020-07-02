<nav class="navbar is-dark">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('home') }}">
                <img src="{{ secure_asset('img/upld.png') }}" style="border-radius: 50%; height: 32px;">
            </a>
        </div>
        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('home') }}">Home</a>
            <a class="navbar-item" href="https://disboard.dev/docs">Documentation</a>
            <a class="navbar-item" href="https://github.com/zackdevine/disboard">Github</a>
        </div>
        <div class="navbar-end">
            @auth
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">{{ Auth::user()->getDisplayName() }}</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            @endauth
            @guest
                <a class="navbar-item" href="{{ route('login') }}">Login</a>
            @endguest
        </div>
    </div>
</nav>