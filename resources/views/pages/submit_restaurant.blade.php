@extends('layouts/contentLayoutMaster')

@section('title', 'Submit Restaurant')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <link href="{{asset('landing/css/skins/square/grey.css')}}" rel="stylesheet">

@endsection
@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll"
             data-image-src="{{asset('landing/img/sub_header_cart.jpg')}}"
             data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Work with us</h1>
                <p>Qui debitis meliore ex, tollit debitis conclusionemque te eos.</p>
                <p></p>
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
        <div class="main_title margin_mobile">
            <h2 class="nomargin_top">Increase your customers</h2>
            <p>
                Cum doctus civibus efficiantur in imperdiet deterruisset.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature">
                    <i class="icon_datareport"></i>
                    <h3><span>Increase</span> your sales</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="feature">
                    <i class="icon_chat_alt"></i>
                    <h3><span>H24</span> chat support</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature">
                    <i class="icon_bag_alt"></i>
                    <h3><span>Delivery</span> or Takeaway</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="feature">
                    <i class="icon_mobile"></i>
                    <h3><span>Mobile</span> support</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature">
                    <i class="icon_wallet"></i>
                    <h3><span>Cash</span> payment</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.6s">
                <div class="feature">
                    <i class="icon_creditcard"></i>
                    <h3><span>Secure card</span> payment</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->

    <div class="white_bg">
        <div class="container margin_60_35">
            <div class="main_title margin_mobile">
                <h2 class="nomargin_top">Our Plans</h2>
                <p>
                    we have tailored plans for all type of restaurants
                </p>
            </div>
            <div class="row text-center plans">
                <div class="plan col-md-4">
                    <h2 class="plan-title">1 Month Plan</h2>
                    <p class="plan-price">ksh 99<span>/00</span></p>
                    <ul class="plan-features">
                        <li><strong>Check and go</strong> included</li>
                        <li><strong>1 month</strong> valid</li>
                        <li><strong>Unsubscribe</strong> anytime</li>
                    </ul>
                </div> <!-- End col-md-4 -->

                <div class="plan plan-tall col-md-4">
                    <span class="ribbon"></span>
                    <span class="ribbon_table"></span>
                    <h2 class="plan-title">3 Months Plan</h2>
                    <p class="plan-price">kSH 199<span>/00</span></p>
                    <ul class="plan-features">
                        <li><strong>Premium</strong> support</li>
                        <li><strong>Check and go</strong> included</li>
                        <li><strong>APP</strong> included</li>
                        <li><strong>3 months</strong> valid</li>
                        <li><strong>Unsubscribe</strong> anytime</li>
                    </ul>
                </div><!-- End col-md-4 -->

                <div class="plan col-md-4">
                    <h2 class="plan-title">6 Months Plan</h2>
                    <p class="plan-price">kSH 299<span>/00</span></p>
                    <ul class="plan-features">
                        <li><strong>Premium</strong> support</li>
                        <li><strong>Check and go</strong> included</li>
                        <li><strong>6 months</strong> valid</li>
                        <li><strong>Unsubscribe</strong> anytime</li>
                    </ul>
                </div><!-- End col-md-4 -->
            </div><!-- End row plans-->
        </div><!-- End container -->
    </div><!-- End white_bg -->

    <div class="container margin_60">
        <div class="main_title margin_mobile">
            <h2 class="nomargin_top">Restaurant registration  form</h2>
            <p class="btn btn-warning">
                You will be required to update restaurant details once logged in.
            </p>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{ route('register') }}" id="registerRestaurantForm"
                      name="registerRestaurantForm">
                    @csrf
                    <input type="hidden" name="role" value="2">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name">Owner Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your fullname">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="email">Owner Email</label>
                                <input id="email" type="email" placeholder="Your email-address" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" placeholder="Your contact phone no." class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rst_name">Restaurant Name</label>
                                <input type="text" id="rst_name" name="rst_name" class="form-control"
                                       placeholder="Ex: Pizza Inn" value="{{old('rst_name')}}">
                                @error('rst_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rst_email">Restaurant Official Email</label>
                                <input type="email" id="rst_email" name="rst_email" class="form-control"
                                       placeholder="Email of restaurant" value="{{old('rst_email')}}">
                                @error('rst_email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div><!-- End row  -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rst_phone">Restaurant Phone No.</label>
                                <input type="tel" id="rst_phone" name="rst_phone" class="form-control"
                                       placeholder="Telephone no" value="{{old('rst_phone')}}">
                                @error('rst_phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">Restaurant Website</label>
                                <input type="text" id="website" name="website" class="form-control"
                                       placeholder="Website of restaurant" value="{{old('website')}}">
                                @error('website')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div><!-- End row  -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Create a password</label>
                                <input id="password" type="password" placeholder="Password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required min="7"
                                       autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password-confirm">Confirm password</label>
                                <input id="password-confirm" type="password" placeholder="Confirm password"
                                       class="form-control" name="password_confirmation" required min="7"
                                       autocomplete="new-password">
                            </div>
                        </div>
                    </div><!-- End row  -->
                    <div class="row">
                        <div class="col-md-6">
                            <label><input required name="terms_check" type="checkbox" value="true" class="icheck">Accept <a
                                    href="javascript:void(0)" >terms
                                    and conditions</a>.</label>
                        </div>
                    </div><!-- End row  -->
                    <hr style="border-color:#ddd;">
                    <div class="text-center">
                        <button class="btn_full_outline">Submit</button>
                    </div>
                </form>
            </div><!-- End col  -->
        </div><!-- End row  -->
    </div><!-- End container  -->
    <!-- End Content =============================================== -->

@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


