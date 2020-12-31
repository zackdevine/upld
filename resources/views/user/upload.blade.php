@extends ('user._layouts.base')
@section ('page.title', 'Upload a file')
@section ('user.title', 'Upload a file')
@section ('user.subtitle', 'Upload a new file below')

@section ('user.content')

    <section class="section">
        <form action="{{ route('user.upload') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="field is-horizontal">
                <div class="field-body">

                    <div class="field">
                        <div id="file-upload" class="file has-name {{ $errors->has('file') ? 'is-danger' : '' }} is-fullwidth">
                            <label class="file-label">
                                <input class="file-input" type="file" name="file">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fad fa-file-upload"></i>
                                    </span>
                                    <span class="file-label">Choose a file...</span>
                                </span>
                                <span class="file-name"></span>
                            </label>
                        </div>
                    </div>

                    <div class="field">
                        <button class="button is-primary" type="submit">Upload</button>
                    </div>

                </div>
            </div>

            <div class="field">
                @if ($errors->has('file'))
                    <p class="help is-danger">{{ $errors->first('file') }}</p>
                @endif
            </div>

        </form>
    </section>

@endsection

@section ('page.js')
<script>
  const fileInput = document.querySelector('#file-upload input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-upload .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
@endsection