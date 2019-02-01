@extends('backend.layouts.login')
@section('title')
Welcome | Register
@endsection
@section('content')
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="login-form-head">
                    <h4>Sign In</h4>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your email">
                        <i class="ti-email"></i>
                    </div>
                    <div class="form-gp"> 
                        @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-gp">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Enter your name">
                        <i class="ti-lock"></i>
                    </div>
                    <div class="form-gp"> 
                        @if ($errors->has('email'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-gp">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter your password">
                        <i class="ti-lock"></i>
                    </div>
                    <div class="form-gp"> 
                        @if ($errors->has('password'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-gp">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm password">
                        <i class="ti-lock"></i>
                    </div>

                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
