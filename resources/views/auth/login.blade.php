@extends('layouts.app')
@section('content')

    <div class="limiter">
        <div class="container-login100" style="background-image: url('/assets/images/img-01.jpg');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form method="post" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <div class="login100-form-avatar">
                        <img src="/assets/images/avatar-01.jpg" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
						John Doe
					</span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                        <input id="email" class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                        <input id="password"  class="input100 @error('password') is-invalid @enderror " type="password" name="password" placeholder="{{ __('Password') }}" autocomplete="off">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
                    </div>

                    <!-- inja -->

                    <div class="wrap-input100 validate-input m-b-10 mostafa" data-validate = "Username is required">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- ta inja -->

                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-230">
                        <a href="{{ route('password.request') }}" class="txt1">
                            {{ __('Forgot Your Password?') }}

                        </a>
                    </div>

                    <div class="text-center w-full">
                        <a class="txt1" href="{{ route('register') }}">
                            {{ __('Create new account') }}

                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
