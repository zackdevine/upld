@extends ('_layouts.base')
@section ('title', 'Plans')

@section ('content')

    <section class="hero is-primary is-medium">
        <div class="hero-head">
            @include ('_layouts.navbar')
        </div>
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">Your profile</h1>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">

                <h1 class="title is-2">Your current plan</h1>
            </div>
        </div>
    </section>

@endsection