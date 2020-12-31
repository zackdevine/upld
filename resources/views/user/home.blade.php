@extends ('user._layouts.base')
@section ('page.title', 'Your profile')
@section ('user.title', 'Your profile')
@section ('user.subtitle', 'Adjust settings below, or view your upload history')

@section ('user.content')

    <section class="section">
        <div class="content">
            <p>Hey {{ Auth::user()->username }}! Welcome to your profile! You can use the menus on the left to adjust settings or view your uploads, or use the buttons below to configure your apps for uploading.</p>
        </div>
    </section>

    <section class="section">
        <div class="content">
            <h1 class="title is-4">Start uploading!</h1>
        </div>

        <div class="columns">

            <div class="column is-one-third">
                <a href="{{ route('user.config.sharex') }}">
                    <div class="notification is-danger">
                        <article class="media">
                            <figure class="media-left">
                                <p><i class="fad fa-cogs fa-3x"></i></p>
                            </figure>
                            <div class="media-content">
                                <p>
                                    <strong>Download ShareX Custom Uploader</strong>
                                </p>
                            </div>
                        </article>
                    </div>
                </a>
            </div>

            <div class="column is-one-third">
                <a href="{{ route('user.config.sharex') }}">
                    <div class="notification is-primary">
                        <article class="media">
                            <figure class="media-left">
                                <p><i class="fab fa-discord fa-3x"></i></p>
                            </figure>
                            <div class="media-content">
                                <p><strong>Get the upld Discord bot</strong></p>
                            </div>
                        </article>
                    </div>
                </a>
            </div>

            <div class="column is-one-third">
                <a href="{{ route('user.upload') }}">
                    <div class="notification is-light">
                        <article class="media">
                            <figure class="media-left">
                                <p><i class="fad fa-file-upload fa-3x"></i></p>
                            </figure>
                            <div class="media-content">
                                <p><strong>Use the web uploader directly</strong></p>
                            </div>
                        </article>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <section class="section">
        <div class="content">
            <h1 class="title is-4">Other uploading apps</h1>
            <p>If you use another uploader app that supports sending files to a URL, then you can use the following information for uploading:</p>
            <p><strong>Url: </strong><kbd>{{ secure_url('api/upload') }}</kbd></p>
            <p><strong>Method: </strong><kbd>POST</kbd></p>
            <p><strong>Body: </strong><kbd>MultipartFormData</kbd></p>
            <p><strong>Form input name: </strong><kbd>file</kbd></p>
            <p><strong>Headers: </strong><kbd>Authorization: Bearer {{ Auth::user()->api_token }}</kbd></p>
            <p>{{ config('app.name') }} will return the url of the content, or an error in json format if one occurs during upload.</p>
        </div>
    </section>

@endsection