@extends('layouts/contentLayoutMaster')

@section('title', $restaurant->title)

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <!-- Radio and check inputs -->
    <link href="{{asset('landing/css/skins/square/grey.css')}}" rel="stylesheet">
    <!-- Gallery -->
    <link href="{{asset('landing/css/slider-pro.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset($restaurant->banner)}}"
             data-natural-width="1400" data-natural-height="470">
        <div id="subheader">
            <div id="sub_content">
                <div id="thumb"><img  style="width:220px !important"src="{{asset($restaurant->logo)}}" alt=""></div>
                <div class="rating">
                    @for($i=1;$i<=5;$i++)
                        <i class="icon_star @if(calculateRating($restaurant)>=$i) voted @endif"></i>
                    @endfor
                    (<small><a href="{{route('pages.restaurants.profile',$restaurant)}}">Read {{$restaurant->ratings->count()}} reviews</a></small>)
                </div>
                <h1>{{$restaurant->title}}</h1>
                <div><em>{{$restaurant->headline}}</em></div>
                <div><i class="icon_pin"></i> {{$restaurant->location}} - <strong>Delivery fee:</strong>
               Ksh {{$restaurant->delivery_fee}}
                </div>
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

    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div><!-- End Map -->

    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row">

            <div class="col-md-4">
                <p>
                    <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false"
                       aria-controls="collapseMap">View on map</a>
                </p>
              {{--
                <div class="box_style_2">
                    <h4 class="nomargin_top">Opening time <i class="icon_clock_alt pull-right"></i></h4>
                    <ul class="opening_list">
                        <li>Monday<span>12.00am-11.00pm</span></li>
                        <li>Tuesday<span>12.00am-11.00pm</span></li>
                        <li>Wednesday <span class="label label-danger">Closed</span></li>
                        <li>Thursday<span>12.00am-11.00pm</span></li>
                        <li>Friday<span>12.00am-11.00pm</span></li>
                        <li>Saturday<span>12.00am-11.00pm</span></li>
                        <li>Sunday <span class="label label-danger">Closed</span></li>
                    </ul>
                </div>
                <div class="box_style_2 hidden-xs" id="help">
                    <i class="icon_lifesaver"></i>
                    <h4>Need <span>Help?</span></h4>
                    <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                    <small>Monday to Friday 9.00am - 7.30pm</small>
                </div>

                --}}
            </div>

            <div class="col-md-8">
                <div class="box_style_2">
                    <h2 class="inner">Description</h2>

                    <div id="Img_carousel" class="slider-pro">
                        <div class="sp-slides">

                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="{{asset('landing/img/slider_single_restaurant/1_medium.jpg')}}"
                                     data-small={{asset('landing/"img/slider_single_restaurant/1_small.jpg"')}}
                                         data-medium="{{asset('landing/img/slider_single_restaurant/1_medium.jpg')}}"
                                     data-large="{{asset('landing/img/slider_single_restaurant/1_large.jpg')}}"
                                     data-retina="{{asset('landing/img/slider_single_restaurant/1_large.jpg')}}">
                            </div>
                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="{{asset('landing/img/slider_single_restaurant/2_medium.jpg')}}"
                                     data-small="{{asset('landing/img/slider_single_restaurant/2_small.jpg')}}"
                                     data-medium="{{asset('landing/img/slider_single_restaurant/2_medium.jpg')}}"
                                     data-large="{{asset('landing/img/slider_single_restaurant/2_large.jpg')}}"
                                     data-retina="{{asset('landing/img/slider_single_restaurant/2_large.jpg')}}">
                                <h3 class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="40"
                                    data-show-transition="left">
                                    Lorem ipsum dolor sit amet </h3>
                                <p class="sp-layer sp-white sp-padding" data-horizontal="40" data-vertical="100"
                                   data-show-transition="left" data-show-delay="200">
                                    consectetur adipisicing elit
                                </p>
                                <p class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="160"
                                   data-width="350" data-show-transition="left" data-show-delay="400">
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="landing/img/slider_single_restaurant/3_medium.jpg"
                                     data-small="landing/img/slider_single_restaurant/3_small.jpg"
                                     data-medium="landing/img/slider_single_restaurant/3_medium.jpg"
                                     data-large="landing/img/slider_single_restaurant/3_large.jpg"
                                     data-retina="landing/img/slider_single_restaurant/3_large.jpg">
                                <p class="sp-layer sp-white sp-padding" data-position="centerCenter" data-vertical="-50"
                                   data-show-transition="right" data-show-delay="500">
                                    Lorem ipsum dolor sit amet
                                </p>
                                <p class="sp-layer sp-black sp-padding" data-position="centerCenter" data-vertical="50"
                                   data-show-transition="left" data-show-delay="700">
                                    consectetur adipisicing elit
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="landing/img/slider_single_restaurant/4_medium.jpg"
                                     data-small="landing/img/slider_single_restaurant/4_small.jpg"
                                     data-medium="landing/img/slider_single_restaurant/4_medium.jpg"
                                     data-large="landing/img/slider_single_restaurant/4_large.jpg"
                                     data-retina="landing/img/slider_single_restaurant/4_large.jpg">
                                <p class="sp-layer sp-black sp-padding" data-position="bottomLeft" data-vertical="0"
                                   data-width="100%" data-show-transition="up">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="landing/img/slider_single_restaurant/5_medium.jpg"
                                     data-small="landing/img/slider_single_restaurant/5_small.jpg"
                                     data-medium="landing/img/slider_single_restaurant/5_medium.jpg"
                                     data-large="landing/img/slider_single_restaurant/5_large.jpg"
                                     data-retina="landing/img/slider_single_restaurant/5_large.jpg">
                                <p class="sp-layer sp-white sp-padding" data-vertical="5%" data-horizontal="5%"
                                   data-width="90%" data-show-transition="down" data-show-delay="400">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="landing/img/slider_single_restaurant/6_medium.jpg"
                                     data-small="landing/img/slider_single_restaurant/6_small.jpg"
                                     data-medium="landing/img/slider_single_restaurant/6_medium.jpg"
                                     data-large="landing/img/slider_single_restaurant/6_large.jpg"
                                     data-retina="landing/img/slider_single_restaurant/6_large.jpg">
                                <p class="sp-layer sp-white sp-padding" data-horizontal="10" data-vertical="10"
                                   data-width="300">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="landing/img/slider_single_restaurant/7_medium.jpg"
                                     data-small="landing/img/slider_single_restaurant/7_small.jpg"
                                     data-medium="landing/img/slider_single_restaurant/7_medium.jpg"
                                     data-large="landing/img/slider_single_restaurant/7_large.jpg"
                                     data-retina="landing/img/slider_single_restaurant/7_large.jpg">
                                <p class="sp-layer sp-black sp-padding" data-position="bottomLeft" data-horizontal="5%"
                                   data-vertical="5%" data-width="90%" data-show-transition="up" data-show-delay="400">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="{{asset('landing/img/slider_single_restaurant/8_medium.jpg')}}"
                                     data-small="{{asset('landing/img/slider_single_restaurant/8_small.jpg')}}"
                                     data-medium="{{asset('landing/img/slider_single_restaurant/8_medium.jpg')}}"
                                     data-large="{{asset('landing/img/slider_single_restaurant/8_large.jpg')}}"
                                     data-retina="{{asset('landing/img/slider_single_restaurant/8_large.jpg')}}">
                                <p class="sp-layer sp-black sp-padding" data-horizontal="50" data-vertical="50"
                                   data-show-transition="down" data-show-delay="500">
                                    Lorem ipsum dolor sit amet
                                </p>
                                <p class="sp-layer sp-white sp-padding" data-horizontal="50" data-vertical="100"
                                   data-show-transition="up" data-show-delay="500">
                                    consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="" class="sp-image" src="{{asset('landing/css/images/blank.gif')}}"
                                     data-src="{{asset('landing/img/slider_single_restaurant/9_medium.jpg')}}"
                                     data-small="{{asset('landing/img/slider_single_restaurant/9_small.jpg')}}"
                                     data-medium="{{asset('landing/img/slider_single_restaurant/9_medium.jpg')}}"
                                     data-large="{{asset('landing/img/slider_single_restaurant/9_large.jpg')}}"
                                     data-retina="{{asset('landing/img/slider_single_restaurant/9_large.jpg')}}">
                            </div>
                        </div>
                        <div class="sp-thumbnails">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/1_medium.jpg')}}">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/2_medium.jpg')}}">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/3_medium.jpg')}}">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/4_medium.jpg')}}">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/5_medium.jpg')}}">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/6_medium.jpg')}}">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/7_medium.jpg')}}">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/8_medium.jpg')}}">
                            <img alt="" class="sp-thumbnail"
                                 src="{{asset('landing/img/slider_single_restaurant/9_medium.jpg')}}">
                        </div>
                    </div>
                    <h3>About us</h3>

                    <p class="add_bottom_30">
                        {{$restaurant->about}}
                    </p>
                    <div id="summary_review">
                        <div id="general_rating">
                            {{$restaurant->ratings->count()}} Reviews
                            <div class="rating">
                                <i class="icon_star "></i><i class="icon_star "></i><i
                                    class="icon_star "></i><i class="icon_star "></i><i class="icon_star"></i>
                            </div>
                        </div>

                        <div class="row" id="rating_summary">
                            <div class="col-md-6">
                                <ul>
                                    <li>Food Quality
                                        <div class="rating">
                                            <i class="icon_star "></i><i class="icon_star "></i><i
                                                class="icon_star "></i><i class="icon_star"></i><i
                                                class="icon_star"></i>
                                        </div>
                                    </li>
                                    <li>Price
                                        <div class="rating">
                                            <i class="icon_star "></i><i class="icon_star "></i><i
                                                class="icon_star "></i><i class="icon_star "></i><i
                                                class="icon_star"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Punctuality
                                        <div class="rating">
                                            <i class="icon_star "></i><i class="icon_star "></i><i
                                                class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                                        </div>
                                    </li>
                                    <li>Courtesy
                                        <div class="rating">
                                            <i class="icon_star "></i><i class="icon_star "></i><i
                                                class="icon_star "></i><i class="icon_star "></i><i
                                                class="icon_star"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- End row -->
                        <hr class="styled">
                        <a href="#" class="btn_1 add_bottom_15" @guest data-toggle="modal" data-target="#login_2"
                           @else data-toggle="modal" data-target="#myReview" @endif>Leave a
                            review</a>
                    </div><!-- End summary_review -->
                    @foreach($restaurant->reviews as $review)

                        <div class="review_strip_single">
                            <img src="{{asset('landing/img/avatar3.jpg')}}" alt="" class="img-circle">
                            <small> - {{$review->created_at}} -</small>
                            <h4>{{$review->customer_profile->user->name}}</h4>
                            <p>
                                {{$review->comment}}  </p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star voted"></i><i class="icon_star"></i><i
                                            class="icon_star"></i>
                                    </div>
                                    Food Quality
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star voted"></i><i class="icon_star"></i><i
                                            class="icon_star"></i>
                                    </div>
                                    Price
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                                    </div>
                                    Punctuality
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star"></i>
                                    </div>
                                    Courtesy
                                </div>
                            </div><!-- End row -->
                        </div><!-- End review strip -->

                    @endforeach
                    @if($restaurant->reviews->count()<1)
                        <div class="review_strip_single text-center">
                            No reviews found
                        </div><!-- End review strip -->
                    @endif

                </div><!-- End box_style_1 -->
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->

    <div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <form method="get" action="{{route('pages.restaurants.review')}}" name="review" id="review"
                      class="popup-form">
                    <div class="login_icon"><i class="icon_comment_alt"></i></div>
                    <input name="restaurant_profile_id" id="restaurantProfileId" type="hidden"
                           value="{{$restaurant->id}}">

                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control form-white" name="food_review" id="food_review" required>
                                <option value="">Food Quality</option>
                                <option value="1">Low</option>
                                <option value="2">Sufficient</option>
                                <option value="3">Good</option>
                                <option value="4">Excellent</option>
                                <option value="5">Super</option>
                                <option value="0">I don't know</option>
                            </select></div>
                        <div class="col-md-6">
                            <select class="form-control form-white" name="price_review" id="price_review" required>
                                <option value="">Price</option>
                                <option value="1">Low</option>
                                <option value="2">Sufficient</option>
                                <option value="3">Good</option>
                                <option value="4">Excellent</option>
                                <option value="5">Super</option>
                                <option value="0">I don't know</option>
                            </select>
                        </div>
                    </div><!--End Row -->

                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control form-white" name="punctuality_review" required
                                    id="punctuality_review">
                                <option value="">Punctuality</option>
                                <option value="1">Low</option>
                                <option value="2">Sufficient</option>
                                <option value="3">Good</option>
                                <option value="4">Excellent</option>
                                <option value="5">Super</option>
                                <option value="0">I don't know</option>
                            </select></div>
                        <div class="col-md-6">
                            <select class="form-control form-white" name="courtesy_review" required
                                    id="courtesy_review">
                                <option value="">Courtesy</option>
                                <option value="1">Low</option>
                                <option value="2">Sufficient</option>
                                <option value="3">Good</option>
                                <option value="4">Excellent</option>
                                <option value="5">Super</option>
                                <option value="0">I don't know</option>
                            </select>
                        </div>
                    </div><!--End Row -->
                    <textarea name="comment" id="review_text" class="form-control form-white" style="height:100px"
                              placeholder="Write your review"></textarea>
                    <input type="submit" value="Submit" class="btn btn-submit" id="submit-review">
                </form>
                <div id="message-review"></div>
            </div>
        </div>
    </div><!-- End Register modal -->

@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="{{asset('landing/js/map_single.js')}}"></script>
    <script src="{{asset('landing/js/infobox.js')}}"></script>
    <script src="{{asset('landing/js/jquery.sliderPro.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#Img_carousel').sliderPro({
                width: 960,
                height: 500,
                fade: true,
                arrows: true,
                buttons: false,
                fullScreen: false,
                smallSize: 500,
                startSlide: 0,
                mediumSize: 1000,
                largeSize: 3000,
                thumbnailArrows: true,
                autoplay: false
            });
        });
    </script>

    <script>
        function windowLoaded() {
            @if(session('error'))
            alert('{{session("error")}}');
            @endif
        }
    </script>
@endsection


