@extends('layouts/contentLayoutMaster')

@section('title', 'Contact Us')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
@endsection
@section('content')

    <!-- banner
      ============================================= -->
    <section class="banner dark" >
        <div id="contact-parallax">
            <div class="bcg background8"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#contact-parallax" style="background-image: url('landing/img/banner/contact.jpg')">
                <div class="bg-transparent">
                    <div class="banner-content">
                        <div class="container" >
                            <div class="slider-content"> <i class="icon-home-ico"></i>
                                <h1>CONTACT US</h1>
                                <p>Get in touch</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>Contact Us</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- End Banner content -->
                </div>
                <!-- End bg trnsparent -->
            </div>
        </div>
        <!-- Service parallax -->
    </section>
    <!-- End Banner -->

    <div id="content">
        <!-- Our Contact
        ============================================= -->
        <section class="contact text-center padding-100">
            <div class="container">
                <div class="row">
                    <!-- Head Title -->
                    <div class="head_title">
                        <i class="icon-intro"></i>
                        <h1>Send Message</h1>
                        <span class="welcome">Keep in Touch</span>
                    </div>
                    <!-- End# Head Title -->
                    <!-- Contact form -->
                    <div class="contact-form">
                        <form method="post" action="process.php" class="form">
                            <!-- Form Group -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-sx-12">
                                        <!-- Element -->
                                        <div class="element">
                                            <input type="text" name="name" class="form-control text" placeholder="Name *" />
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-sx-12">
                                        <!-- Element -->
                                        <div class="element">
                                            <input type="text" name="email" class="form-control text" placeholder="E-mail *" />
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-sx-12">
                                        <!-- Element -->
                                        <div class="element">
                                            <input type="text" name="website" class="form-control text" placeholder="Website" />
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                </div>
                            </div>
                            <!-- End form group -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <!-- Element -->
                                        <div class="element">
                                            <div>
                                                <!-- Element -->
                                                <div class="element">
                                                    <textarea name="comment" class="text textarea" placeholder="Message *" ></textarea>
                                                </div>
                                                <!-- End Element -->
                                            </div>
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                    <!-- End form Group -->
                                </div>
                            </div>
                            <!-- Element -->
                            <div class="element">
                                <button type="submit" id="submit" value="Send" class="btn btn-black">Send</button>
                                <div class="loading"></div>
                            </div>
                            <!-- End Element -->
                        </form>
                        <div class="done">
                            <strong>Thank you!</strong> We have received your message.
                        </div>
                    </div>
                    <!-- End contact form -->
                </div>
            </div>
        </section>
        <!-- End contact -->
        <!-- Address content
        ============================================= -->
        <section class="address-content dark">
            <!--  BG parallax -->
            <div id="address-content">
                <div class="bcg"
                     data-center="background-position: 50% 0px;"
                     data-bottom-top="background-position: 50% 100px;"
                     data-top-bottom="background-position: 50% -100px;"
                     data-anchor-target="#address-content"
                     style="background-image:url('landing/img/banner/certification.jpg');"
                >
                    <!-- BG transparent -->
                    <div class="bg-transparent padding-100">
                        <div class="container">
                            <div class="row">
                                <!-- Adress -->
                                <div class="col-md-4 adress">
                                    <!-- Icon -->
                                    <div class="col-md-3 icon "> <i class="fa fa-road"></i> </div>
                                    <!-- End Icon -->
                                    <!-- Content Item -->
                                    <div class="col-md-9 content-item">
                                        <h3>Adress</h3>
                                        <p> 1422 1st St. Santa Rosa,t CA. <br>
                                            USA.</p>
                                    </div>
                                    <!-- End content Item -->
                                </div>
                                <!--End Adress -->
                                <!-- Phone -->
                                <div class="col-md-4 Phone">
                                    <!-- Icon -->
                                    <div class="col-md-3 icon"> <i class="fa fa-phone"></i> </div>
                                    <!-- End Icon -->
                                    <!-- Content Item -->
                                    <div class="col-md-9 content-item">
                                        <h3>PHONE</h3>
                                        <p>Telephone:<span>(001) 123-4567</span></p>
                                        <p>Mobile:<span>(001) 123-4567</span></p>
                                    </div>
                                    <!-- End content Item -->
                                </div>
                                <!--End Phone -->
                                <!-- Email -->
                                <div class="col-md-4 email">
                                    <!-- Icon -->
                                    <div class="col-md-3 icon"> <i class="fa fa-envelope"></i> </div>
                                    <!-- End Icon -->
                                    <!-- Content Item -->
                                    <div class="col-md-9 content-item">
                                        <h3>E-MAIL</h3>
                                        <p>Support:<a href="mailto:admin@e-mail.com">admin@e-mail.com</a></p>
                                        <p>Sales:<a href="mailto:admin@e-mail.com">admin@e-mail.com</a></p>
                                    </div>
                                    <!-- End content Item -->
                                </div>
                                <!--End Email -->
                            </div>
                        </div>
                    </div>
    F            </div>
                <!-- End BG transparent -->
            </div>
            <!-- End BG parallax -->
        </section>
        <!-- End address content -->
        <!-- Map
        ============================================= -->
        <div class="map">
            <div id="map"></div>
        </div>
        <!-- End map -->
    </div>
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


