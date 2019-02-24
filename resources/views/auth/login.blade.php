@extends ('_layouts.base')
@section ('title', 'Login')

@section ('content')

    <section class="hero is-primary is-medium">
        <div class="hero-head">@include ('_layouts.navbar')</div>
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third">
                        <h2 class="title is-2">Login to {{ config('app.name') }}</h2>
                    </div>
                    
                    <div class="column is-one-third is-offset-one-third">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            
                            <div class="field">
                                <label class="label">Username</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input{{ $errors->has('username') ? 'has-danger' : '' }}" type="text" placeholder="username" name="username">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                @if ($errors->has('username'))
                                    <p class="help is-danger">{{ $errors->first('username') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input{{ $errors->has('password') ? 'has-danger' : '' }}" type="password" placeholder="password" name="password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <button class="button is-white is-rounded" type="submit">Login</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">
                <h1 class="title is-3">Don't have an account?</h1>
                <p><a href="{{ route('register') }}" class="button is-primary is-rounded">Click here to create one!</a></p>
            </div>
        </div>
    </section>

@endsection