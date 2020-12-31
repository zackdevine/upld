<section class="section">
    <aside class="menu">

        <p class="menu-label">Your profile</p>
        <ul class="menu-list">

            <li>
                <a href="{{ route('user.home') }}" class="{{ Request::is('user') ? 'is-active' : '' }}">
                    <i class="fad fa-home fa-fw fa-lg"></i>
                    &nbsp;Home
                </a>
            </li>

            <li>
                <a href="{{ route('user.uploads') }}" class="{{ Request::is('user/uploads*') ? 'is-active' : '' }}">
                    <i class="fad fa-cloud fa-fw fa-lg"></i>
                    &nbsp;Uploads
                </a>
            </li>

        </ul>

        <p class="menu-label">Domains</p>
        <ul class="menu-list">

            <li>
                <a href="{{ route('user.subdomain') }}" class="{{ Request::is('user/subdomain*') ? 'is-active' : '' }}">
                    <i class="fad fa-bullseye-pointer fa-fw fa-lg"></i>
                    &nbsp;Subdomain
                </a>
            </li>

            <li>
                <a href="{{ route('user.domain') }}" class="{{ Request::is('user/domain*') ? 'is-active' : '' }}">
                    <i class="fad fa-link fa-fw fa-lg"></i>
                    &nbsp;Custom domain
                </a>
            </li>

        </ul>

    </aside>
</section>