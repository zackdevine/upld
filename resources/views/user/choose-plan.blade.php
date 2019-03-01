@extends ('_layouts.base')
@section ('title', 'Choose a plan')

@php
    use App\Subscription;
    use App\User;
    use Illuminate\Support\Str;
@endphp

@section ('content')

    <section class="hero is-primary is-medium">
        <div class="hero-head">
            @include ('_layouts.navbar')
        </div>
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">Choose a plan</h1>
                @if (Auth::user()->subscribed('upld'))
                    <h2 class="subtitle is-3">Your current plan is {{ Auth::user()->subscription('upld')->stripe_plan }}</h2>
                @else
                    <h2 class="subtitle is-3">You do not currently have a plan selected</h2>
                @endif
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">

                <div class="pricing-table">

                    <div class="pricing-plan">
                        <div class="plan-header">Free</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>0</span>/month</div>
                        <div class="plan-items">
                            <div class="plan-item">Free subdomain</div>
                            <div class="plan-item">{{ config('services.upld.domains.free') == 0 ? 'No' : config('services.upld.domains.free') }} custom {{ Str::plural('domain', config('services.upld.domains.free')) }}</div>
                            <div class="plan-item">{{ config('services.upld.retention.free') == 0 ? 'Permanent' : 'Temporary' }} storage @if(config('services.upld.retention.free') > 0)({{ config('services.upld.retention.free') }} days)@endif</div>
                            <div class="plan-item">File size limit ({{ config('services.upld.filesize.free') }} MB)</div>
                        </div>
                        <div class="plan-footer">
                            <button id="free-checkout-button" role="link" class="button is-fullwidth is-primary is-bold is-rounded">Select Free</button>
                            <div id="free-error-message"></div>
                        </div>
                    </div>

                    <div class="pricing-plan">
                        <div class="plan-header">Basic</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>1</span>/month</div>
                        <div class="plan-items">
                            <div class="plan-item">Free subdomain</div>
                            <div class="plan-item">{{ config('services.upld.domains.basic') == 0 ? 'No' : config('services.upld.domains.basic') }} custom {{ Str::plural('domain', config('services.upld.domains.basic')) }}</div>
                            <div class="plan-item">{{ config('services.upld.retention.basic') == 0 ? 'Permanent' : 'Temporary' }} storage @if(config('services.upld.retention.basic') > 0)({{ config('services.upld.retention.basic') }} days)@endif</div>
                            <div class="plan-item">File size limit ({{ config('services.upld.filesize.basic') }} MB)</div>
                        </div>
                        <div class="plan-footer">
                            <a href="{{ route('register') }}" class="button is-fullwidth is-primary is-bold is-rounded">Select Basic</a>
                        </div>
                    </div>

                    <div class="pricing-plan">
                        <div class="plan-header">Pro</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>5</span>/month</div>
                        <div class="plan-items">
                            <div class="plan-item">Free subdomain</div>
                            <div class="plan-item">{{ config('services.upld.domains.pro') == 0 ? 'No' : config('services.upld.domains.pro') }} custom {{ Str::plural('domain', config('services.upld.domains.pro')) }}</div>
                            <div class="plan-item">{{ config('services.upld.retention.pro') == 0 ? 'Permanent' : 'Temporary' }} storage @if(config('services.upld.retention.pro') > 0)({{ config('services.upld.retention.pro') }} days)@endif</div>
                            <div class="plan-item">File size limit ({{ config('services.upld.filesize.pro') }} MB)</div>
                        </div>
                        <div class="plan-footer">
                            <a href="{{ route('register') }}" class="button is-fullwidth is-primary is-bold is-rounded">Select Pro</a>
                        </div>
                    </div>

                    <div class="pricing-plan">
                        <div class="plan-header">Premium</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>10</span>/month</div>
                        <div class="plan-items">
                            <div class="plan-item">Free subdomain</div>
                            <div class="plan-item">{{ config('services.upld.domains.premium') == 0 ? 'No' : config('services.upld.domains.premium') }} custom {{ Str::plural('domain', config('services.upld.domains.premium')) }}</div>
                            <div class="plan-item">{{ config('services.upld.retention.premium') == 0 ? 'Permanent' : 'Temporary' }} storage @if(config('services.upld.retention.premium') > 0)({{ config('services.upld.retention.premium') }} days)@endif</div>
                            <div class="plan-item">Large file size limit (2 GB)</div>
                        </div>
                        <div class="plan-footer">
                            <a href="{{ route('register') }}" class="button is-fullwidth is-primary is-bold is-rounded">Select Premium</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection

@section ('js')
    <script type="text/javascript">
        var freeCheckoutButton = document.getElementById('free-checkout-button');
        freeCheckoutButton.addEventListener('click', function () {
            stripe.redirectToCheckout({
                items: [{plan: 'Free', quantity: 1}],
                successUrl: 'https://upld.app/pay/success',
                cancelUrl: 'https://upld.app/pay/canceled'
            })
            .then(function (result) {
                if (result.error) {
                    var displayError = document.getElementById('free-error-message');
                    displayError.textContent = result.error.message;
                }
            });
        });
</script>
@endsection()