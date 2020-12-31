@extends ('user._layouts.base')
@section ('page.title', 'Custom domain')
@section ('user.title', 'Custom domain')
@section ('user.subtitle', 'Setup your custom domain below')

@section ('user.content')

    <section class="section">
        <p>You can use the field below to create or update your own custom domain for {{ config('app.name') }}. Domains are unique to your account, and you can only have one. Any content you upload will be made available at this link.</p>
        @if (Auth::user()->domain)
        <br>
        <div class="notification is-warning">
            <article class="media">
                <figure class="media-left">
                    <p><i class="fad fa-exclamation-triangle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        Changing your domain will cause all previous links to no longer resolve! Make sure you update them after changing your domain!
                    </p>
                </div>
            </article>
        </div>
        @endif
    </section>

    <section class="section">
        <form action="{{ route('user.domain') }}" method="post">
            @csrf

            <div class="field is-horizontal">
                <div class="field-body">

                    <div class="field">
                        <p class="control is-expanded">
                            <input class="input {{ $errors->has('domain') ? 'is-danger' : '' }}" type="text" placeholder="my-domain.tld" name="domain" value="{{ Auth::user()->domain ?? '' }}">
                        </p>
                    </div>

                    <div class="field">
                        <button class="button is-primary" type="submit">Set Domain</button>
                    </div>

                </div>
            </div>

            <div class="field">
                @if ($errors->has('domain'))
                    <p class="help is-danger">{{ $errors->first('domain') }}</p>
                @endif
            </div>

        </form>
    </section>

@endsection