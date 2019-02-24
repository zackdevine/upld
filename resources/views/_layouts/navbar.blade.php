<nav class="navbar">
    <div class="container">
        
        <div class="navbar-brand">
            <a href="{{ route("home") }}" class="navbar-item"><strong>{{ config('app.name') }}</strong></a>
        </div>

        <div class="navbar-end">
        	<a href="{{ route('features') }}" class="navbar-item">Features</a>
        	<a href="{{ route('plans') }}" class="navbar-item">Plans</a>
        	<a href="{{ route('download') }}" class="navbar-item">Download</a>
        	<a href="{{ route('docs') }}" class="navbar-item">Documentation</a>
        	<p class="navbar-item">|</p>
        	@auth
	        	<a href="{{ route('profile') }}" class="navbar-item">{{ Auth::user()->username }}</a>
        	@else
	        	<a href="{{ route('login') }}" class="navbar-item">Login</a>
	        	<a href="{{ route('register') }}" class="navbar-item">Register</a>
        	@endif
        </div>

    </div>
</nav>