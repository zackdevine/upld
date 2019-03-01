@php use App\Upload; @endphp
@extends ('_layouts.base')
@section ('title', 'Your profile')

@section ('content')

    <section class="hero is-primary is-medium">
        <div class="hero-head">
            @include ('_layouts.navbar')
        </div>
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-2">Your profile</h1>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">

                <h1 class="title is-4">Upload options</h1>
                <div class="buttons">
                    <a href="{{ url('/profile/download/sharex') }}" class="button is-primary is-rounded is-bold has-icon">
                        <span class="icon"><i class="fas fa-arrow-circle-down"></i></span>
                        <span>Download ShareX Custom Uploader</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">

                <h1 class="title is-4">Most recent uploads</h1>
                @forelse(Upload::where('userid', Auth::id())->orderBy('created_at', 'desc')->get()->take(5) as $upload)

                @empty
                    <p>You don't have any uploads yet!</p>
                @endforelse

            </div>
        </div>
    </section>

@endsection