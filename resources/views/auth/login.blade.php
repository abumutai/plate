@extends('layouts/contentLayoutMaster')

@section('title', 'Login')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
@endsection
@section('content')
    <!-- Full Background BG
        ============================================= -->
    <section class="login-full dark clearfix" >
        <!-- Bg Full Bg -->
        <div class="fullheight full-bg background40">
            <div class="bg-transparent">
                <!-- Slider content -->
                <div class="slider-content">
                    <h1>Login</h1>
                    <span class="welcome ">Login to continue</span>
                    <div class="form-group padding-45">
                        <form method="POST" class="text-left" action="{{ route('login') }}">
                            @csrf
                               <label for="email" class="" style="display: none">{{ __('E-Mail Address') }}</label>
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                               @error('email')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror

                                <label for="password" class="" style="display: none">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-capitalize" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn form-control btn-white">Login</button>
                        </form>
                    </div>
                    <div class="forget text-center">
                        <p><a href="{{route('register')}}">Create an account <i class="fa fa-chevron-circle-right"></i></a></p>
                        <p><a href="{{ route('password.request') }}">I've forgotten my password <i class="fa fa-chevron-circle-right"></i></a></p>
                    </div>
                </div>
                <!-- End Slider content -->
            </div>
            <!-- End Bg Transparent -->
        </div>
        <!-- End Full Bg -->
    </section>
    <!-- End Full Screen BG -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


