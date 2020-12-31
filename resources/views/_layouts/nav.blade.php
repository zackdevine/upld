<nav class="navbar is-light is-fixed-top">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('app.home') }}">
                <p class="image is-rounded">
                    <img src="{{ asset('favicon.png') }}" class="is-rounded">
                </p>
                &nbsp;&nbsp;{{ config('app.name') }}
            </a>

            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu" id="navMenu">
            
            <div class="navbar-start">

                <a class="navbar-item" href="{{ route('app.home') }}">
                    <span class="icon">
                        <i class="fad fa-home fa-fw"></i>
                    </span>
                    <span>&nbsp;&nbsp;Home</span>
                </a>

                @auth
                <a class="navbar-item" href="{{ route('user.upload') }}">
                    <span class="icon">
                        <i class="fad fa-file-upload fa-fw"></i>
                    </span>
                    <span>&nbsp;&nbsp;Upload</span>
                </a>
                @endauth

            </div>
            
            <div class="navbar-end">

                @auth
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <img src="{{ Auth::user()->avatar }}" style="border-radius: 4px; height: 32px;">
                            &nbsp;&nbsp;{{ Auth::user()->getDisplayName() }}
                        </a>

                        <div class="navbar-dropdown is-right">

                            <a class="navbar-item" href="{{ route('user.home') }}">
                                <span class="icon">
                                    <i class="fad fa-user fa-fw"></i>
                                </span>
                                <span>Profile</span>
                            </a>

                            <a class="navbar-item" href="{{ route('auth.logout') }}">
                                <span class="icon">
                                    <i class="fad fa-sign-out-alt fa-fw"></i>
                                </span>
                                <span>Sign out</span>
                            </a>

                        </div>
                    </div>
                @endauth
                @guest
                    <a class="navbar-item" href="{{ route('auth.login') }}">
                        <span class="icon"><i class="fab fa-discord"></i></span>
                        <span>Login with Discord</span>
                    </a>
                @endguest
            </div>

        </div>
    </div>
</nav>