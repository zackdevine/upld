@extends ('_layouts.base')
@section ('title', 'Features')

@section ('content')

    <section class="hero is-primary is-medium">
        <div class="hero-head">
            @include ('_layouts.navbar')
        </div>
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">Features</h1>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">
                <div class="columns">

                    <div class="column is-one-third has-text-centered">
                        <span class="icon is-large">
                            <i class="fas fa-cloud-upload-alt fa-fw fa-4x"></i>
                        </span>
                        <h2 class="is-4 title">Easy file uploading</h2>
                        <p>Use our online file uploader to share files, or integrate our services into your preferred app!</p>
                    </div>

                    <div class="column is-one-third has-text-centered">
                        <span class="icon is-large">
                            <i class="fas fa-terminal fa-fw fa-4x"></i>
                        </span>
                        <h2 class="is-4 title">Developer friendly</h2>
                        <p>Build your own scripts and tools using our simple and robust API!</p>
                    </div>

                    <div class="column is-one-third has-text-centered">
                        <span class="icon is-large">
                            <i class="fab fa-github fa-fw fa-4x"></i>
                        </span>
                        <h2 class="is-4 title">Open source</h2>
                        <p>Are we missing something? Submit changes and help us improve by contributing!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section has-text-centered">
        <div class="container">
            <div class="content is-large">
                Ready to get started? <a href="{{ route('register') }}" class="button is-primary is-rounded">Click here!</a>
            </div>
        </div>
    </section>

@endsection