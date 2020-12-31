@php use App\Models\UserUpload; @endphp

@extends ('user._layouts.base')
@section ('page.title', 'Uploads')
@section ('user.title', 'Uploads')
@section ('user.subtitle')
Page {{ $uploads->currentPage() }} of {{ $uploads->lastPage() }}
@endsection

@section ('user.content')

    <section class="section">
        {{ $uploads->links() }}
    </section>

    <section class="section">

        @forelse ($uploads as $upload)

            @if ($loop->index % 5 == 0 || $loop->first)
                @if (!$loop->first)
                    </div>
                @endif
                <div class="columns">
            @endif

            <div class="column is-one-fifth">
                <a href="{{ $upload->url }}" target="_blank">
                    <figure class="image is-square">
                        <img src="{{ $upload->url }}" class="is-">
                    </figure>
                </a>
            </div>

        @empty
            <p>You don't have any stickers :(</p>
        @endforelse

    </section>

    <section class="section">
        {{ $uploads->links() }}
    </section>

@endsection