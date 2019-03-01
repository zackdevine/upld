@extends ('_layouts.base')
@section ('title', 'Register')

@section ('content')

    <section class="hero is-primary is-medium">
        <div class="hero-head">@include ('_layouts.navbar')</div>
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third">
                        <h2 class="title is-2">Create an account</h2>
                    </div>
                    
                    <div class="column is-one-third is-offset-one-third">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            
                            <div class="field">
                                <label class="label">Username</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input {{ $errors->has('username') ? 'has-danger' : '' }}" type="text" placeholder="username" name="username">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                @if ($errors->has('username'))
                                    <p class="help is-danger">{{ $errors->first('username') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label">Email address</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input {{ $errors->has('email') ? 'has-danger' : '' }}" type="text" placeholder="you@example.com" name="email">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input {{ $errors->has('password') ? 'has-danger' : '' }}" type="password" placeholder="password" name="password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label">Confirm password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}" type="password" placeholder="confirm password" name="password_confirmation">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <button class="button is-white is-rounded" type="submit">Register</button>
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
                <h1 class="title is-3">Already have an account?</h1>
                <p><a href="{{ route('login') }}" class="button is-primary is-rounded">Click here to login!</a></p>
            </div>
        </div>
    </section>

@endsection
