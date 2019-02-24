@extends ('_layouts.base')
@section ('title', 'Home')

@section ('content')

    <section class="hero is-primary is-fullheight">
        <div class="hero-head">
            @include ('_layouts.navbar')
        </div>
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">Welcome to {{ config("app.name") }}!</h1>
                <h2 class="subtitle is-3">The easy-to-use file sharing app for everyone</h2>
            </div>
        </div>
    </section>

@endsection