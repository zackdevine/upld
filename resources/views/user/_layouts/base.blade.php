@extends ('_layouts.base')

@section ('page.title')
@yield ('user.title')
@endsection
@section ('hero.size', 'is-medium')
@section ('hero.foot')

    <div class="container">
            
        <article class="media">
            <figure class="media-left">
                <p class="image is-96x96">
                    <img class="is-rounded" src="{{ Auth::user()->avatar }}"/>
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <h1 class="title is-2">@yield ('user.title')</h1>
                    <h2 class="subtitle is-4">@yield ('user.subtitle')</h2>
                </div>
            </div>
        </article>

    </div>

@endsection

@section ('page.content')

    <div class="container">
        <div class="columns">
            <div class="column is-one-quarter">
                @include ('user._layouts.nav')
            </div>
            <div class="column">
                @yield ('user.content')
            </div>
        </div>
    </div>

@endsection