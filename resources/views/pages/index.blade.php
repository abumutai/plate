@extends('layouts/contentLayoutMaster')

@section('title', 'Welcome to ')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <style>
        .icon-bg {/*
            background: #00bfff;
            width: 60px;
            height: 60px;
            text-align: center;
            line-height: 57px;
            border-radius: 50%;
            color: #fff;
            font-size: 32px;
            */
        }

        .media .media-body {
           padding: 4em 1em!important;
            border: 1px solid rgba(128, 128, 128, 0.09);
        }
        .w3-text-shadow {
            text-shadow: 1px 1px 0 #444
        }

        .w3-text-shadow-white {
            text-shadow: 1px 1px 0 #ddd
        }

    </style>
@endsection
@section('content')
    <!-- SubHeader =============================================== -->
    <section class="header-video" style="background-color: #6A1B9A;">
        
        <div id="hero_video">
            <div id="sub_content">
                <h1 class="text">Search  food and Drinks </h1>
                <!-- <p style="font-weight: 200!important;margin-top: 2em">
                 or browse restaurants
                </p> -->
                <form method="get" action="{{route('item.search')}}">
                    <div id="custom-search-input">
                        <div class="input-group">
                            <input type="text" autocomplete="off" style="background-color: white" class="w3-text-shadow search-query" value="" name="search_item" placeholder="ugali nyama">
                            <span class="input-group-btn" >
                        <input type="submit" class="btn_search" value="submit" >
                        </span>
                        </div>
                    </div>
                </form>
                <div>
                <br>
                <P>or</P>
                   

        <a href="{{route('pages.restaurants')}}" class="button_intro outline">View Restaurants</a>
      </div>
            </div>
            <!-- End sub_content -->
         
       
        </div>
        <img src="{{asset('landing/img/landing1.jpg')}}" alt="" class="header-video--media"
             data-provider="Vimeo" data-video-width="1920" data-video-height="960">
        <div id="count" class="hidden-xs">
            <ul>
                <li>
                    <a href="{{route('d_tips')}}" class="button_intro outline">Diet Tips</a>
                </li>
                <li><a href="{{route('pages.restaurants')}}" class="" style="color: white!important;"> <span class="number">{{\App\RestaurantProfile::all()->count()}}</span>  Restaurants</a></li>
                <li><span class="number">{{\App\Order::all()->count()}}</span> People served</li>
            </ul>
        </div>
    </section><!-- End Header video -->
    <!-- End SubHeader ============================================ -->

    <!-- Content ================================================== -->
    <div class="container margin_60">

        <div class="main_title">
            <h2 class="nomargin_top" style="padding-top:0">How delivery works</h2>
            <p>
                We have made it easy to order and get your food delivered
            </p>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box_home" id="one">
                    <span>1</span>
                    <h3>Search by address</h3>
                    <p>
                        Find all restaurants available in your zone.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="two">
                    <span>2</span>
                    <h3>Choose a restaurant</h3>
                    <p>
                        We have more than 1000s of menus online.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="three">
                    <span>3</span>
                    <h3>Pay by card or cash</h3>
                    <p>
                        It's quick, easy and totally secure.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="four">
                    <span>4</span>
                    <h3>Delivery or takeaway</h3>
                    <p>
                        You are lazy? Are you backing home?
                    </p>
                </div>
            </div>
        </div><!-- End row -->

        <div id="delivery_time" class="hidden-xs">
            <strong><span>2</span><span>5</span></strong>
            <h4>The minutes that usually takes to deliver!</h4>
        </div>
    </div><!-- End container -->

    <div class="nomargin_top">
        <div class="container">

            <div class="main_title">
                <h2 class="text">Donwload Sahani App Today</h2>
                <p class="py-2">
                   Order on the go
                </p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 pt-5  my-auto">
                    <div class="media mb-4">
                        <div class="media-body text-right">
                            <!-- <h5 class="mt-0 mb-2">TIME SAVING</h5>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate. </p> -->
                        </div>
                        <div class="icon-bg ml-3">	<i class="icofont icofont-clock-time"></i></div>
                    </div>
                    <div class="media mb-4">
                        <div class="media-body text-right">
                            <!-- <h5 class="mt-0 mb-2">IDEAS COMPARABLE</h5>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate. </p> -->
                        </div>
                        <div class="icon-bg ml-3">	<i class="icofont icofont-idea"></i></div>
                    </div>
                    <div class="media">
                        <div class="media-body text-right">
                            <!-- <h5 class="mt-0 mb-2">AMAZING FEATURE</h5>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate. </p> -->
                        </div>
                        <div class="icon-bg ml-3">	<i class="fa fa-video-camera" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="extra-pic text-center">
                        <img src="{{asset('images/backgrounds/extra.jpg')}}" alt="img">
                    </div>
                    <div class="text-center" style="background-color:D78243;">
                        <a href="https://play.google.com/store/apps/details?id=com.app.sahani&hl=en_US" class="button_intro"><i ></i> Available on Android</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5  my-auto">
                    <ul class="list-unstyled">
                        <li class="media mb-4">
                            <div class="icon-bg mr-3"><i class="icofont icofont-ui-browser"></i></div>
                            <div class="media-body">
                                <!-- <h5 class="mt-0 mb-1 text-uppercase">Fast Browser </h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate. </p> -->
                            </div>
                        </li>
                        <li class="media mb-4">
                            <div class="icon-bg mr-3"><i class="icofont icofont-ui-map"></i></div>
                            <div class="media-body">
                                <!-- <h5 class="mt-0 mb-1">Cureent Locations</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate. </p> -->
                            </div>
                        </li>
                        <li class="media">
                            <div class="icon-bg mr-3">	<i class="icofont icofont-video-alt"></i></div>
                            <div class="media-body">
                                <!-- <h5 class="mt-0 mb-1">HD Videos</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate. </p> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


{{--
    <div class="white_bg">
        <div class="container margin_60">

            <div class="main_title">
                <h2 class="nomargin_top" style="background-color: #6A1B9A;">Choose from Most Popular</h2>
                <p>
                    We have partnered  with several known restaurants to cater for your needs
                </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="detail_page.html" class="strip_list">
                        <div class="ribbon_1">Popular</div>
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="{{asset('landing/img/thumb_restaurant.jpg')}}" alt="">
                            </div>
                            <div class="rating">
                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                            </div>
                            <h3>Taco Mexican</h3>
                            <div class="type">
                                Mexican / American
                            </div>
                            <div class="location">
                                135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                            </div>
                            <ul>
                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                            </ul>
                        </div><!-- End desc-->
                    </a><!-- End strip_list-->
                </div><!-- End col-md-6-->
                <div class="col-md-6">
                    <a href="detail_`page.html" class="strip_list">
                        <div class="ribbon_1">Popular</div>
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="{{asset('landing/img/thumb_restaurant_4.jpg')}}" alt="">
                            </div>
                            <div class="rating">
                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                            </div>
                            <h3>Sushi Gold</h3>
                            <div class="type">
                                Sushi / Japanese
                            </div>
                            <div class="location">
                                135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                            </div>
                            <ul>
                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                <li>Delivery<i class="icon_close_alt2 no"></i></li>
                            </ul>
                        </div><!-- End desc-->
                    </a><!-- End strip_list-->=
                </div>
            </div><!-- End row -->

        </div><!-- End container -->
    </div><!-- End white_bg -->
--}}
    <div class="high_light" style="background-color: #6A1B9A;">
        <div class="container" > 
            <h3>Choose from over {{\App\RestaurantProfile::all()->count()}} Restaurants</h3>
            <p>We have various catalogue to choose from</p>
            <a href="{{route('pages.restaurants')}}">View all Restaurants</a>
        </div><!-- End container -->
    </div><!-- End hight_light -->

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('images/backgrounds/office_del.png')}}"
             data-natural-width="1200" data-natural-height="600" style="background-color: rgba(50,50,50,0.58);background-blend-mode: screen!important;">
        <div class="parallax-content">
            <div class="sub_content">
                <i class="icon_mug"></i>
                <h3 class="w3-text-shadow">We also deliver to your office</h3>
                <p>
                    We have a wide reach to even the places you work
                </p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End Content =============================================== -->

    <div class="container margin_60">
        <div class="main_title margin_mobile">
            <h2 class="nomargin_top">Work with Us</h2>
            <p>
               Submit your restaurant or work as a driver for us
            </p>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <a class="box_work" href="{{route('register')}}">
                    <img src="{{asset('images/backgrounds/restaurant.png')}}" width="848" height="480" alt="" class="img-responsive">
                    <h3>Submit your Restaurant<span>Start to earn customers</span></h3>
                  {{--
                    <p>Lorem ipsum dolor sit amet, ut virtute fabellas vix, no pri falli eloquentiam adversarium. Ea
                        legere labore eam. Et eum sumo ocurreret, eos ei saepe oratio omittantur, legere eligendi
                        partiendo pro te.</p>
                        --}}
                    <div class="btn_1" href="{{route('register')}}">Read more</div>
                </a>
            </div>
            <!-- <div class="col-md-4">
                <a class="box_work" href="{{route('pages.driver.submit')}}">
                    <img src="{{asset('images/backgrounds/driver.png')}}" width="848" height="480" alt=""
                         class="img-responsive">
                    <h3>We are looking for a Driver<span>Start to earn money</span></h3>
                    {{--
                    <p>Lorem ipsum dolor sit amet, ut virtute fabellas vix, no pri falli eloquentiam adversarium. Ea
                        legere labore eam. Et eum sumo ocurreret, eos ei saepe oratio omittantur, legere eligendi
                        partiendo pro te.</p>
                        --}}
                    <div class="btn_1">Read more</div>
                </a>
            </div> -->
        </div><!-- End row -->
    </div><!-- End container -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{asset('landing/js/video_header.js')}}"></script>
    <script>
        $(document).ready(function () {
            'use strict';
            HeaderVideo.init({
                container: $('.header-video'),
                header: $('.header-video--media'),
                videoTrigger: $("#video-trigger"),
                autoPlayVideo: true
            });

        });
    </script>
    <script>
        function windowLoaded() {

        }
    </script>
@endsection


