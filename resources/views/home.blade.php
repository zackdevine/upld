@extends ('layouts.base')
@section ('page.title', 'Home')
@section ('page.content')

<section class="hero is-bold is-primary is-fullheight">
    <div class="hero-head">
        @include ('layouts.nav')
    </div>
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-2">Welcome to {{ config('app.name') }}!</h1>
            <h2 class="subtitle is-4">The easy-to-use file sharing app!</h2>
        </div>
    </div>
</section>

@endsection