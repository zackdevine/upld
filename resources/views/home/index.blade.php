@extends ('_layouts.base')
@section ('title', 'Home')

@section ('content')

    <section class="hero is-primary is-fullheight">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a href="{{ route("home") }}" class="navbar-item"><strong>{{ config('app.name') }}</strong></a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container">
                <article class="media">
                    <figure class="media-left">
                        <span class="icon is-large">
                            <i id="header_icon" class="fas fa-terminal fa-fw"></i>
                        </span>
                    </figure>
                    <div class="media-content">
                        <h1 class="title is-1">Welcome to {{ config("app.name") }}!</h1>
                        <h2 class="subtitle is-3">The easy-to-use file sharing app for <strong class="is-family-monospace" id="header_user">developers</strong></h2>
                    </div>
                </article>
            </div>
        </div>
    </section>

@endsection

@section ('js')

    <script type="text/javascript">
        var headerUsers = [ 'developers', 'gamers', 'artists', 'writers', 'bloggers', 'anyone' ]
        var headerIcons = [ 'fas fa-terminal', 'fas fa-gamepad', 'fas fa-paint-brush', 'fas fa-signature', 'fas fa-blog', 'fas fa-users' ]
        var curIndex = 0
        var maxIndex = 5

        function rotateThroughUsers () {
            // console.log("calling rotateThroughUsers() with index " + curIndex)
            animateCss("#header_icon", "flipOutX")
            animateCss("#header_user", "flipOutX", function () {
                curIndex++
                if (curIndex > maxIndex) { curIndex = 0 }
                $("#header_icon").attr("class", headerIcons[curIndex] + " fa-fw fa-3x")
                $("#header_user").html(headerUsers[curIndex])
                animateCss("#header_icon", "flipInX")
                animateCss("#header_user", "flipInX")
            })
        }

        setInterval(rotateThroughUsers, 5000)
        rotateThroughUsers()
    </script>

@endsection