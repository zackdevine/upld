@extends ('user._layouts.base')
@section ('page.title', 'Subdomain')
@section ('user.title', 'Subdomain')
@section ('user.subtitle', 'Change your personal ' . config('app.name') . ' subdomain')

@section ('user.content')

    <section class="section">
        <p>You can use the field below to create or update your own custom subdomain for {{ config('app.name') }}. Subdomains are unique to your account, and you can only have one. Any content you upload will be made available by default at this link. Subdomains are in the form of <code>@verbatim{subdomain}@endverbatim.{{ env('APP_BASE_URL') }}</code>.</p>
        @if (Auth::user()->subdomain)
        <br>
        <div class="notification is-warning">
            <article class="media">
                <figure class="media-left">
                    <p><i class="fad fa-exclamation-triangle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        Changing your subdomain will cause all previous links to no longer resolve! Make sure you update them after changing your subdomain!
                    </p>
                </div>
            </article>
        </div>
        @endif
    </section>

    <section class="section">
        <form action="{{ route('user.subdomain') }}" method="post">
            @csrf

            <div class="field is-horizontal">
                <div class="field-body">

                    <div class="field has-addons">
                        <p class="control is-expanded">
                            <input class="input {{ $errors->has('subdomain') ? 'is-danger' : '' }}" type="text" placeholder="subdomain" name="subdomain" value="{{ Auth::user()->subdomain ?? '' }}">
                        </p>
                        <p class="control">
                            <a class="button is-static">.{{ env('APP_BASE_URL') }}</a>
                        </p>
                    </div>

                    <div class="field">
                        <button class="button is-primary" type="submit">Set Subdomain</button>
                    </div>

                </div>
            </div>

            <div class="field">
                @if ($errors->has('subdomain'))
                    <p class="help is-danger">{{ $errors->first('subdomain') }}</p>
                @endif
            </div>

        </form>
    </section>

@endsection