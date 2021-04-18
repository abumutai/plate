@extends('layouts/contentLayoutMaster')

@section('title', 'Work with us')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <link href="{{asset('landing/css/skins/square/grey.css')}}" rel="stylesheet">

@endsection
@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('landing/img/sub_header_cart.jpg')}}"
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
            <h2 class="nomargin_top">Flexible Job and Great fees</h2>
            <p>
                Cum doctus civibus efficiantur in imperdiet deterruisset.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature_2">
                    <i class="icon_currency"></i>
                    <h3>Great Fees</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="feature_2">
                    <i class="icon_easel"></i>
                    <h3>Growing possibility</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature_2">
                    <i class="icon_mobile"></i>
                    <h3>Manage your own orders via App</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="feature_2">
                    <i class="icon_map_alt"></i>
                    <h3>Work in a small area</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature_2">
                    <i class="icon_clock_alt"></i>
                    <h3>Flexible time</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.6s">
                <div class="feature_2">
                    <i class="icon_calendar"></i>
                    <h3>Flexible days</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor
                        imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features-bg img_2">
                    <div class="features-img">
                    </div>
                </div>
            </div>
            <div class="col-md-6 nopadding">
                <div class="features-content">
                    <h3>"What you'll need"</h3>
                    <ul class="list_ok">
                        <li>A bicycle or scooter/motorbike with relevant safety equipment (road safety is a huge must for
                            us!).
                        </li>
                        <li>Smartphone - iPhone 4s or above or Android 4.3 or above.</li>
                        <li>The right to work in the USA.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- End container-fluid  -->

    <div class="container margin_60">
        <div class="main_title margin_mobile">
            <h2 class="nomargin_top">Please submit the form below</h2>
            <p>
                Cum doctus civibus efficiantur in imperdiet deterruisset.
            </p>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" id="name_contact" name="name_contact"
                                       placeholder="Jhon">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" id="lastname_contact" name="lastname_contact"
                                       placeholder="Doe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" id="email_contact" name="email_contact" class="form-control"
                                       placeholder="jhon@email.com">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Phone number:</label>
                                <input type="text" id="phone_contact" name="phone_contact" class="form-control"
                                       placeholder="00 44 5435435">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Do you have a motorbike or scooter?</h5>
                                <label><input name="motor" type="radio" value="" class="icheck" checked>Yes</label>
                                <label class="margin_left"><input name="motor" type="radio" value=""
                                                                  class="icheck">No</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Are you a student?</h5>
                                <label><input name="student" type="radio" value="" class="icheck" checked>Yes</label>
                                <label class="margin_left"><input name="student" type="radio" value=""
                                                                  class="icheck">No</label>
                            </div>
                        </div>
                    </div><!-- End row  -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Do you have a driving license?</h5>
                                <label><input name="license" type="radio" value="" class="icheck" checked>Yes</label>
                                <label class="margin_left"><input name="license" type="radio" value=""
                                                                  class="icheck">No</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Do you have an iPhone or Android mobile?</h5>
                                <label><input name="mobile" type="radio" value="" class="icheck" checked>Yes</label>
                                <label class="margin_left"><input name="mobile" type="radio" value=""
                                                                  class="icheck">No</label>
                            </div>
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


