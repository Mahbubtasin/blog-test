@include('include.admin_head')

<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="{{asset('admin/images/logo.png')}}" alt="">
                </a>
            </div>
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Email Address</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                        <label class="pull-right">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </label>

                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="{{route('register')}}"> Sign Up Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('include.admin_scripts')
