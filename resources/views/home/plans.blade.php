@extends ('_layouts.base')
@section ('title', 'Plans')

@section ('content')

    <section class="hero is-primary is-medium">
        <div class="hero-head">
            @include ('_layouts.navbar')
        </div>
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">Plans</h1>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">

                <h1 class="is-4 title">View all of our account plans below!</h1>
                <p>You can switch plans or cancel at any time. We use <a href="https://stripe.com" target="_blank">Stripe</a> for our payment processor to provide hassle-free subscriptions.</p>

                <div class="pricing-table">

                    <div class="pricing-plan">
                        <div class="plan-header">Free</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>0</span>/month</div>
                        <div class="plan-items">
                            <div class="plan-item">Free subdomain</div>
                            <div class="plan-item">No custom domains</div>
                            <div class="plan-item">Temporary storage (60 days)</div>
                            <div class="plan-item">File size limit (8 MB)</div>
                        </div>
                        <div class="plan-footer">
                            <a href="{{ route('register') }}" class="button is-fullwidth is-primary is-bold is-rounded">Get started for free</a>
                        </div>
                    </div>

                    <div class="pricing-plan">
                        <div class="plan-header">Basic</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>1</span>/month</div>
                        <div class="plan-items">
                            <div class="plan-item">Free subdomain</div>
                            <div class="plan-item">1 custom domain</div>
                            <div class="plan-item">Temporary storage (120 days)</div>
                            <div class="plan-item">File size limit (100 MB)</div>
                        </div>
                        <div class="plan-footer">
                            <a href="{{ route('register') }}" class="button is-fullwidth is-primary is-bold is-rounded">Get started with Basic</a>
                        </div>
                    </div>

                    <div class="pricing-plan">
                        <div class="plan-header">Pro</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>5</span>/month</div>
                        <div class="plan-items">
                            <div class="plan-item">Free subdomain</div>
                            <div class="plan-item">5 custom domains</div>
                            <div class="plan-item">Temporary storage (1 year)</div>
                            <div class="plan-item">File size limit (500 MB)</div>
                        </div>
                        <div class="plan-footer">
                            <a href="{{ route('register') }}" class="button is-fullwidth is-primary is-bold is-rounded">Get started with Pro</a>
                        </div>
                    </div>

                    <div class="pricing-plan">
                        <div class="plan-header">Premium</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>10</span>/month</div>
                        <div class="plan-items">
                            <div class="plan-item">Free subdomain</div>
                            <div class="plan-item">10 custom domains</div>
                            <div class="plan-item">Permanent storage</div>
                            <div class="plan-item">Large file size limit (2 GB)</div>
                        </div>
                        <div class="plan-footer">
                            <a href="{{ route('register') }}" class="button is-fullwidth is-primary is-bold is-rounded">Get started with Premium</a>
                        </div>
                    </div>

                    <div class="pricing-plan">
                        <div class="plan-header">Open-source</div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">$</span>0</span></div>
                        <div class="plan-items">
                            <div class="plan-item">Any custom domain</div>
                            <div class="plan-item">Run on your own server</div>
                            <div class="plan-item">As much storage as you want</div>
                            <div class="plan-item">No file limit size</div>
                        </div>
                        <div class="plan-footer">
                            <a href="{{ url('docs/hosting-upld') }}" class="button is-fullwidth is-primary is-bold is-rounded">Learn more</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection