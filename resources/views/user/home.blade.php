@php use App\Upload; @endphp
@extends ('layouts.base')
@section ('page.title', 'Home')
@section ('page.content')

<section class="hero is-bold is-primary">
    <div class="hero-head">
        @include ('layouts.nav')
    </div>
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-2">Hello {{ auth()->user()->getDisplayName() }}!</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">

        <h1 class="title is-3">Account access</h1>
        <h2 class="subtitle is-5">How to upload</h2>

        <div id="tabs-with-content">
            <div class="tabs">
                <ul>
                    <li class="is-active">
                        <a onclick="showInfo('sharex');">
                            <span class="icon is-small"><i class="fad fa-upload" aria-hidden="true"></i></span>
                            <span>ShareX</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="showInfo('discord');">
                            <span class="icon is-small"><i class="fab fa-discord" aria-hidden="true"></i></span>
                            <span>Discord</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="showInfo('curl');">
                            <span class="icon is-small"><i class="fad fa-terminal" aria-hidden="true"></i></span>
                            <span>Command line (curl)</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="showInfo('customapp');">
                            <span class="icon is-small"><i class="fad fa-code" aria-hidden="true"></i></span>
                            <span>Custom application</span>
                        </a>
                    </li>
                </ul>
            </div>
            <br>
            <div class="content is-medium">
                <section class="tab-content box">
                    <p>
                        Do you use <a href="https://getsharex.com" target="_blank">ShareX</a>? Click the button below to download a custom uploader configuration file tailored to your account!
                        <br><br><a href="{{ secure_url('/dlcfg/sharex') }}" target="_blank" class="button is-primary">Download ShareX Config</a>
                    </p>
                </section>
                <section class="tab-content box">
                    <p>Want to easily snip messages and images posted in your <a href="https://discord.com" target="_blank">Discord</a> server? Invite the upld bot!</p>
                    <a href="#" target="_blank" class="button is-primary">Invite upld to your server</a>
                    <p><small>Note: The upld bot <b>only</b> works in public channels with certain permissions set.</small></p>
                </section>
            </div>
        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <h1 class="title is-3">Latest uploads</h1>

        <div class="columns">
            @forelse (Upload::where('author', auth()->user()->id)->orderBy('created_at', 'desc')->get()->take(5) as $upload)
                <div class="column">
                    <div class="card">
                        @if (substr($upload->mime_type, 0, 5) == 'image')
                            <div class="card-image">
                                <figure class="image">
                                    <img src="{{ $upload->s3_path }}">
                                </figure>
                            </div>
                        @endif

                        <div class="card-content">
                            <div class="content">
                                <p>Uploaded {{ $upload->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>It looks like you have no uploads... See the "Account access" section above to get started!</p>
            @endforelse
        </div>

</section>



<script type="text/javascript">
// https://eiji.dev/bulma-tabs-with-content.html
let tabsWithContent = (function () {
  let tabs = document.querySelectorAll('.tabs li');
  let tabsContent = document.querySelectorAll('.tab-content');

  let deactvateAllTabs = function () {
    tabs.forEach(function (tab) {
      tab.classList.remove('is-active');
    });
  };

  let hideTabsContent = function () {
    tabsContent.forEach(function (tabContent) {
      tabContent.classList.remove('is-active');
    });
  };

  let activateTabsContent = function (tab) {
    tabsContent[getIndex(tab)].classList.add('is-active');
  };

  let getIndex = function (el) {
    return [...el.parentElement.children].indexOf(el);
  };

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      deactvateAllTabs();
      hideTabsContent();
      tab.classList.add('is-active');
      activateTabsContent(tab);
    });
  })

  tabs[0].click();
})();

</script>

@endsection