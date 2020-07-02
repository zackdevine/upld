@extends ('layouts.base')
@section ('page.title', 'Your images')
@section ('page.content')

<section class="hero is-bold is-primary is-medium">
    <div class="hero-head">
        @include ('layouts.nav')
    </div>
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-2">Uploaded images</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">

        @if (session('success'))
            <div class="notification is-success">
                <button class="delete"></button>
                {{ session('success') }}
            </div>
        @endif

        <div class="columns">
            <div class="column is-two-thirds">
                @if ($images->count() == 0)
                    <p>You don't have any images uploaded yet :(</p>
                @else
                    <div class="tile is-ancestor">
                        @foreach ($images as $image)
                            <div class="tile card">
                                <div class="card-image">
                                    <figure class="image">
                                        <img src="{{ $image->url }}">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        <p class="title is-4">{{ $image->title }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="column is-one-fifth is-offset-one-fifth">
                <form action="{{ route('uploadImage') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="apikey" value="{{ Auth::user()->api_key }}">
                    <div class="field has-addons">
                        <p class="control">
                            <div id="file-upload" class="file has-name">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fad fa-cloud-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file...
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </p>
                        <p class="control">
                            <button class="button is-primary" type="submit">
                                Upload
                            </button>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>



<script>
  const fileInput = document.querySelector('#file-upload input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-upload span.file-label');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>

@endsection