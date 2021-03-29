@extends('layouts/contentLayoutMaster')

@section('title', 'Welcome to ')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <style>
        .set {
            /*background-image:  url('images/backgrounds/agency-content-img02.jpg'); position: top center no-repeat;*/
            animation: animateBg forwards 2s ease-in;
            background-size: cover;
            background-color: #ffff3d;
            background-image: url('images/button/p1.jpeg');
            width: 100%; height: 360px; 
            position: relative;
        }
        @keyframes animateBg{
            from { background-size: 100px; }
            to { background-size: 100%; }
        }
        /* Image Zooming Effect */

        #videoBG{
            position: fixed;
            z-index: -1;
            
        }
        @media (min-aspect-ratio: 16/9) {
            #videoBG{
                width: 100%;
                background-size: cover;
                
            }
        }
        @media (max-aspect-ratio: 16/9) {
            #videoBG{
                width: auto;
                height: 100%;
            }
        }

        #video1 { margin: auto; display: block;}
        #videoMessage { position: absolute; top: 0; left: 0;
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center; 
            width: 100%;
            height: 100%;
        }
        .zoom {
            padding: 50px;
            transition: transform .2s; /* Animation */
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }

        .zoom:hover {
            transform: scale(2.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }

        .flip-box {
            background-color: transparent;
            border: 1px solid #f1f1f1;
            perspective: 500px;
        }

        .flip-box-inner {
            position: relative;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-box:hover .flip-box-inner {
            transform: rotateY(180deg);
            transition-duration: 0.100s;
        }

        .flip-box-front, .flip-box-back {
            position: relative;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .flip-box-front {
            
            color: #fff;
        }

        .flip-box-back:hover {
            transform: rotateY(180deg);
            background-repeat:no-repeat;
            background-size: cover;
            transform: scale(2.0);
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

        #set {

            background-image:  url('images/backgrounds/agency-content-img02.jpg');
            background-repeat: no-repeat, repeat;
            background-size: cover; 
        }

        /* This is for transformational transitions */



    </style>
@endsection
@section('content')
    <!-- SubHeader =============================================== -->
    <section class="header-video set">

        
        <div id="hero_video">
           <!-- <video id="video1"  poster="videos/frame.jpg" autoplay muted loop>
               <source src="videos/animation.mp4" type="video/mp4">
            </video> -->


            
           <!-- <div id="sub_content">
                <br><br>
                <h1 class="text">Search  food and Drinks </h1>
                 <p style="font-weight: 200!important;margin-top: 2em">
                 or browse restaurants
                </p> -->
                <br><br><br><br><br><br><br><br><br><br><br>
                <form method="get" action="{{route('item.search')}}">
                    <div id="custom-search-input">
                        <h2 class="text" style="color: #fff;">Search Foods and Drinks</h2>
                        <div class="input-group">
                            <input type="text" autocomplete="off" autofocus style="background-color: white" class="w3-text search-query" value="" name="search_item" placeholder="ugali nyama" style="background-color: transparent">
                            <span class="input-group-btn" >
                        <input type="submit" class="btn_search" value="submit" >
                        </span>
                        </div>
                    </div>
                </form>
                <div>
                <br>
                <P>or</P>
                   
                
      </div>
        
            </div> 
            <!-- End sub_content -->
         
       
        </div>
        <img src="{{asset('landing/img/landing1.jpg')}}" alt="" class="header-video--media"
             data-provider="Vimeo" data-video-width="1920" data-video-height="960">
        <div id="count" class="hidden-xs" style="background-color: transparent; font-size: 30px">
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
            <div class="col-md-3 flip-box">
                <div class="box_home flip-box-inner" id="one">
                    <span>1</span>
                    <div class="flip-box-front">

                        <h3>Search by address</h3>
                        <p>
                            Find all restaurants available in your zone.
                        </p>
                    </div>
                    <div>
                       <img src="images/button/address.png" alt="this is good stuff" width="200px">                    
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="two">
                    <span>2</span>
                    <div>
                        <h3>Choose a restaurant</h3>
                        <p>
                            We have more than 1000s of menus online.
                        </p>

                    </div>
                    <img src="images/button/resturant.jpg" alt="Resturant Images" width="200px">
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="three">
                    <span>3</span>
                    <div class="flip-box-tront">
                        <h3>Pay by card or cash</h3>
                        <p>
                            It's quick, easy and totally secure.
                        </p>

                    </div>
                    <div class="flip-box-back">
                        <img src="images/button/images.png" width="200px" alt="This is another image">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="four">
                    <span>4</span>
                    <h3>Delivery or takeaway</h3>
                    <p>
                        You are lazy? Are you backing home?
                    </p>
                    <img src="images/button/payment-methods.png" alt="Set Your Location Map" width="200px">
                </div>
            </div>
        </div><!-- End row -->

        <div id="delivery_time" class="hidden-xs">
            <strong><span>2</span><span>5</span></strong>
            <h4>The minutes that usually takes to deliver!</h4>
        </div>
    </div><!-- End container -->

    <div class="nomargin_top" style="background-color: #f5da42; border-radius: 15px; color:#fff">
        <div class="container">

            <div class="main_title">
                <h2 class="text">Donwload Sahani App Today</h2>
                <p class="py-2">
                   Order on the go
                </p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 pt-5  my-auto">
                    <div class="media mb-4" style="background-color:rgba(128, 128, 128, 0.5); border-radius: 10px; color: #fff">
                        <div class="media-body text-right">
                            <h5 class="mt-0 mb-2">TIME SAVING</h5>
                            <p>Every software program is built for a purpose. Performance metrics measure if the product fulfils its purpose and if it performs the way it is meant to.
                                 It also refers to how the application uses resources, its scalability,
                                  customer satisfaction, and response times. </p>
                        </div>
                        <div class="icon-bg ml-3">	<i class="fa fa-clock-time"></i></div>
                    </div>
                   
                   
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="extra-pic text-center">
                        <img src="{{asset('images/backgrounds/extra.jpg')}}" alt="img">
                    </div>
                    <div class="text-center" style="background-color:D78243; margin-top: 10px">
                        <a href="https://play.google.com/store/apps/details?id=com.app.sahani&hl=en_US" class="button_intro"><i ></i> Available on Android</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5  my-auto">
                    <ul class="list-unstyled">
                    <div class="media" style="background-color:rgba(128, 128, 128, 0.5); border-radius: 10px; color: #fff">
                        <div class="media-body text-right">
                            <h5 class="mt-0 mb-2">AMAZING FEATURE</h5>
                            <p>An important quality metric is whether the program is practicable and user-friendly.
                                  We also ensure that the client is happy with the features and performance.</p>
                        </div>
                        
                    </div>
                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>


{{--
    <div class="white_bg">
        <div class="container margin_60">

            <div class="main_title">
                <h2 class="nomargin_top" style="background-color: #f5ef42;">Choose from Most Popular</h2>
                <p>
                    We have partnered  with several well known restaurants to cater for your needs
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
    <div class="high_light" style="background-color: gray">
        <div class="container" > 
            <h3>Choose from over {{\App\RestaurantProfile::all()->count()}} Restaurants</h3>
            <p>We have various catalogue to choose from</p>
            <a href="{{route('pages.restaurants')}}">View all Restaurants</a>
        </div><!-- End container -->
    </div><!-- End hight_light -->

    <section class="parallax-window" data-parallax="scroll" data-image-src="images/button/map.jfif"
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


