@extends('layouts/contentLayoutMaster')

@section('title', 'Reset your password')

@section('vendor-style')
<!-- Vendor css files -->
@endsection
@section('page-style')
<!-- Page css files -->
<!-- Radio and check inputs -->

@endsection
@section('content')
<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('images/backgrounds/woman-checking-email.jpg')}}" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">
            <h1>Reset your password</h1>
            <p>A link to reset your password will be send to your email</p>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Home</a></li>
            <li><a href="#0">Category</a></li>
            <li>Page active</li>
        </ul>
        <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> Search</a>
    </div>
</div><!-- Position -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row justify-content-center" id="contacts">
        <div class="col-md-8 col-sm-8">
            <div class="fullheight full-bg background40">
                <div class="bg-transparent">
                    <!-- Slider content -->
                    <div class="slider-content">
                        <h1>Reset Password</h1>
                        <span class="welcome ">Enter email to continue</span>
                        <div class="form-group padding-45">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <label for="email" class="" style="display: none">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                                <button type="submit" class="btn form-control btn-white"> {{ __('Send Password Reset Link') }}</button>
                            </form>
                        </div>
                    </div>
                    <!-- End Slider content -->
                </div>
                <!-- End Bg Transparent -->
            </div>
        </div>
    </div>
</div>


<!-- End container -->
<!-- End Content =============================================== -->

@endsection
@section('vendor-script')
<!-- Vendor js files -->

@endsection
@section('page-script')
<!-- Page js files -->
@endsection