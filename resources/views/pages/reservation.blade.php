@extends('layouts/contentLayoutMaster')

@section('title', 'Reservation')

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
            <div class="bcg background9"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#contact-parallax"
            >
                <div class="bg-transparent">
                    <div class="banner-content">
                        <div class="container" >
                            <div class="slider-content  ">

                                <i class="icon-home-ico"></i>
                                <h1>RESERVATION</h1>
                                <p>Book your table</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>Reservation</li>
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
        <!-- Food Date blocks
        ============================================= -->
        <section id="slide2-02" class="date-block-dark text-center padding-100">
            <div class="container date-blocks">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Block item -->
                        <div class="block-item"> <img src="landing/img/breakfast_dark.png" alt="">
                            <h2>BREAKFAST</h2>
                            <p>6.00 am 10.00 am</p>
                        </div>
                        <!-- End Block item -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Block item -->
                        <div class="block-item"> <img src="landing/img/lunch_dark.png" alt="">
                            <h2>LUNCH</h2>
                            <p>10.00 am 2.00 pm</p>
                        </div>
                        <!-- End Block item -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Block item -->
                        <div class="block-item"> <img src="landing/img/dinner_dark.png" alt="">
                            <h2>DINNER</h2>
                            <p>4.00 pm 12.00 pm</p>
                        </div>
                        <!-- End Block item -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Block item -->
                        <div class="block-item"> <img src="landing/img/dessert_dark.png" alt="">
                            <h2>dessert</h2>
                            <p>All Day</p>
                        </div>
                        <!-- End Block item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End date blocks-->
        <!-- RESERVATION
        ============================================= -->
        <section id="slide2-03" class="reservation dark home_2 text-center" >
            <!-- Bg Parallax -->
            <div class="bcg background33"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#slide2-03"
            >
                <!-- Bg Transparent -->
                <div class="bg-transparent padding-100">
                    <div class="container">
                        <div class="row">
                            <!-- Head Title -->
                            <div class="head_title">
                                <i class="icon-intro"></i>
                                <h1>RESERVATION</h1>
                                <span class="welcome">Book your table</span>
                            </div>
                            <!-- End# Head Title -->

                            <!-- Reservation form style2-->
                            <form class="reserv_form reserv_style2" action="reser-process.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <!-- Form group -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-sx-12">
                                                        <input name="name2" class="form-control" type="text" placeholder="Your Name *" required>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sx-12">
                                                        <input name="email2" class="form-control" type="email" placeholder="email" >
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sx-12">
                                                        <!-- Selct wrap -->
                                                        <div class="select_wrap">
                                                            <select class="form-control" name="occasion">
                                                                <option value="one">Occasion *</option>
                                                                <option value="d">One</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                                <option value="five">Five</option>
                                                            </select>
                                                        </div>
                                                        <!-- End select wrap -->
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sx-12">
                                                        <!-- Selct wrap -->
                                                        <div class="select_wrap">
                                                            <select class="form-control" name="food">
                                                                <option value="one">Preferred food *</option>
                                                                <option value="d">One</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                                <option value="five">Five</option>
                                                            </select>
                                                        </div>
                                                        <!-- End select wrap -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End form group -->
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-sx-12">
                                                        <input name="branch" class="form-control" type="text" placeholder="Branch Name *" required>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sx-12">
                                                        <input name="personnum" class="form-control" type="text" placeholder="Number of Persons" >
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sx-12">
                                                        <input name="phone" class="form-control" type="tel" placeholder="Phone No.">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sx-12 datepicker">
                                                        <input name="date" class="form-control" id="datetimepicker" placeholder="Date" type="text" >
                                                        <i class="fa fa-calendar"></i> </div>
                                                </div>
                                            </div>
                                            <!-- End form group -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- form group -->
                                        <div class="form-group">
                                            <textarea name="comment2" placeholder="Message"></textarea>
                                        </div>
                                        <!-- End form group -->
                                    </div>
                                </div>
                                <div class="row element">
                                    <div class="loading2"></div>
                                    <button class="btn btn-gold white" name="submit" value="Send" id="reser-submit" type="submit">BOOK YOUR TABLE</button>
                                </div>
                            </form>
                            <!-- End reserv home -->
                            <div class="done2">
                                <strong>Thank you!</strong> We have received your message.
                            </div>
                        </div>
                    </div>
                    <!-- End bg transparent -->
                </div>
                <!-- End Bg Parallax -->
        </section>
        <!-- End RESERVATION -->
        <!-- Extra touch Block
        ============================================= -->
        <section class="extra_touch padding-100 text-center">
            <div class="container">
                <div class="row">
                    <h2>Come & <span>Experiences</span> our best of world class cuisine</h2>
                    <a href="contact.html" class="btn black btn-gold ">GET IN TOUCH</a> </div>
            </div>
        </section>
        <!-- End extra touch -->
        <!-- Map
        ============================================= -->
        <div class="map">
            <div id="map"></div>
        </div>
        <!-- End map -->
    </div>
    <!-- end of #content -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


