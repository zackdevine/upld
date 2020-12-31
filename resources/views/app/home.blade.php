@extends ('_layouts.base')

@section ('page.title', 'Welcome!')
@section ('hero.size', 'is-medium')
@section ('hero.body')

    <div class="container">
        <div class="content">
            <h1 class="title is-2">Welcome to {{ config('app.name') }}!</h1>
            <h2 class="subtitle is-4">A simple and easy-to-use content sharing platform!</h2>
        </div>
    </div>

@endsection

@section ('page.content')

    <section class="section">
        <div class="container">
            <h1 class="title is-2">Why use {{ config('app.name') }}?</h1>
        </div>    
    </section>

    <section class="section">
        <div class="container">
            <article class="media">
                <figure class="media-left">
                    <p class="image has-text-primary">
                        <i class="fad fa-user-cog fa-fw fa-5x"></i>
                    </p>
                </figure>
                <div class="media-content">
                    <h2 class="subtitle is-4">Automatic ShareX configuration</h2>
                    <p>{{ config('app.name') }} provides a simple one-click configuration file for ShareX, so you can start uploading your images quickly and easily.</p>
                </div>
            </article>
        </div>    
    </section>

    <section class="section">
        <div class="container">
            <article class="media">
                <figure class="media-left">
                    <p class="image has-text-primary">
                        <i class="fad fa-cloud-upload fa-fw fa-5x"></i>
                    </p>
                </figure>
                <div class="media-content">
                    <h2 class="subtitle is-4">Amazon S3 hosting</h2>
                    <p>Content is securely uploaded to Amazon S3 for instant access.</p>
                </div>
            </article>
        </div>    
    </section>

    <section class="section">
        <div class="container">
            <article class="media">
                <figure class="media-left">
                    <p class="image has-text-primary">
                        <i class="fad fa-link fa-fw fa-5x"></i>
                    </p>
                </figure>
                <div class="media-content">
                    <h2 class="subtitle is-4">Custom domains</h2>
                    <p>Use your own domain with {{ config('app.name') }} or use one of our subdomains!</p>
                </div>
            </article>
        </div>    
    </section>

    <section class="section">
        <div class="container">
            <article class="media">
                <figure class="media-left">
                    <p class="image has-text-primary">
                        <i class="fab fa-discord fa-fw fa-5x"></i>
                    </p>
                </figure>
                <div class="media-content">
                    <h2 class="subtitle is-4">Discord integration</h2>
                    <p>{{ config('app.name') }} uses Discord for authentication and has a <a href="#">Discord bot</a> you can use in your server to easily upload content!</p>
                </div>
            </article>
        </div>    
    </section>

@endsection