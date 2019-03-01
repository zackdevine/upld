<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield ('title') / {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <script src="{{ asset("js/app.js") }}"></script>
        @if (config('services.stripe.enabled'))
            <script src="https://js.stripe.com/v3"></script>
            <script type="text/javascript">
                var stripe = Stripe('pk_test_i1Gmdi32cUYMEDW8dcik1evl',
                {
                    betas: ['checkout_beta_4']
                });
            </script>
        @endif
        <script type="text/javascript">
            function animateCss(element, animationName, callback) {
                const node = document.querySelector(element)
                node.classList.add('animated', animationName)

                function handleAnimationEnd() {
                    node.classList.remove('animated', animationName)
                    node.removeEventListener('animationend', handleAnimationEnd)

                    if (typeof callback === 'function') callback()
                }

                node.addEventListener('animationend', handleAnimationEnd)
            }
        </script>
    </head>
    <body>
        @yield ('content')
        @yield ('js')
    </body>
</html>