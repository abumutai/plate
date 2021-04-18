@extends('layouts/contentLayoutMaster')

@section('title', 'Restaurants/Hotels')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <!-- Radio and check inputs -->
    <link href="{{asset('landing/css/skins/square/grey.css')}}" rel="stylesheet">
    <link href="{{asset('landing/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('landing/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

@endsection
@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll"
             data-image-src="{{asset('images/backgrounds/rest_header.png')}}" data-natural-width="1400"
             data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
               {{--
                <h1>24 results in your zone</h1>
                <div><i class="icon_pin"></i> 135 Newtownards Road, Belfast, BT4 1AB</div>
                --}}
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

            <div class="col-md-3">
                <p>
                    <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false"
                       aria-controls="collapseMap">View on map</a>
                </p>
                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false"
                       aria-controls="collapseFilters" id="filters_col_bt">Filters <i
                            class="icon-plus-1 pull-right"></i></a>
                    <div class="collapse" id="collapseFilters">
                        <div class="filter_type">
                            <h6>Distance</h6>
                            <input type="text" id="range" value="" name="range">
                            <h6>Type</h6>
                            <ul>
                                <li><label><input type="checkbox" checked class="icheck">All <small>({{$restaurants->count()}})</small></label>
                                </li>
                                @foreach($filterType as $ft)
                                    <li><label><input type="checkbox" class="icheck">{{$ft->type}} <small>({{$restaurants->where('type',$ft->type)->count()}})</small></label><i
                                            class="color_1"></i></li>
                                @endforeach
                            </ul>
                        </div>
                     {{--
                        <div class="filter_type">
                            <h6>Rating</h6>
                            <ul>
                                <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i>
							</span></label></li>
                                <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star"></i>
							</span></label></li>
                                <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star"></i><i
                                                class="icon_star"></i>
							</span></label></li>
                                <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i
                                                class="icon_star"></i><i class="icon_star"></i>
							</span></label></li>
                                <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i
                                                class="icon_star"></i><i class="icon_star"></i>
							</span></label></li>
                            </ul>
                        </div>
                        --}}
                        <div class="filter_type">
                            <h6>Options</h6>
                            <ul class="nomargin">
                                <li><label><input type="checkbox" class="icheck">Delivery</label></li>
                                <li><label><input type="checkbox" class="icheck">Take Away</label></li>
                                <li><label><input type="checkbox" class="icheck">Distance 10Km</label></li>
                                <li><label><input type="checkbox" class="icheck">Distance 5Km</label></li>
                            </ul>
                        </div>
                    </div><!--End collapse -->
                </div><!--End filters col-->
            </div><!--End col-md -->

            <div class="col-md-9">

                <div id="tools">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="styled-select">
                                <select name="sort_rating" id="sort_rating">
                                    <option value="" selected>Sort by ranking</option>
                                    <option value="lower">Lowest ranking</option>
                                    <option value="higher">Highest ranking</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 hidden-xs">
                            <a href="" class="bt_filters"><i class="icon-list"></i></a>
                        </div>
                    </div>
                </div><!--End tools -->

                <div class="row">
                    @php
                        $count=0;
                    @endphp
                    @foreach($restaurantsPaginated as $restaurant)
                        <div class="col-md-6 col-sm-6 wow zoomIn" data-wow-delay="{{$count+=.1}}s">
                            <a class="strip_list grid" href="{{route('pages.restaurants.menu',$restaurant)}}">
                               @if(calculateRating($restaurant)>3)
                                    <div class="ribbon_1">Popular</div>
                                @endif
                                <div class="desc">
                                    <div class="thumb_strip">
                                        <img src="{{$restaurant->logo ?? asset('images/restaurants/logo/rest_default.png')}} " alt="">
                                                
                                    </div>
                                    <div class="rating">
                                        @for($i=1;$i<=5;$i++)
                                            <i class="icon_star @if(calculateRating($restaurant)>=$i) voted @endif"></i>
                                        @endfor
                                    </div>
                                    <h3>{{$restaurant->title}}</h3>
                                    <div class="type">
                                        {{$restaurant->headline}}
                                    </div>
                                    <div class="location">{{$restaurant->location ?? 'No Location'}}
                                        <br>
                                       
                                        </div>
                                        <div class="location">
                                         Open Hours  {{$restaurant->opening_hours ?? '6 AM - 10 AM' }}</span> 
                                    </div> 
                                    <ul>
                                        @foreach(\App\Service::all() as $service)
                                            <li>
                                                {{$service->title}}<i
                                                    class="@if($restaurant->restaurant_services->where('service_id',$service->id)->first()) icon_check_alt2 ok @else icon_close_alt2 no @endif"></i>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </a><!-- End strip_list-->
                        </div><!-- End col-md-6-->
                    @endforeach
                </div>
                <div class="row load_more_bt wow fadeIn text-center justify-content-center" data-wow-delay="0.2s">
                    <div class="col-12 d-flex justify-content-center text-center justify-content-center">
                        {{$restaurantsPaginated->links()}}
                    </div>
                </div>
                {{--<a href="#0" class="load_more_bt wow fadeIn" data-wow-delay="0.2s">Load more...</a>--}}
            </div><!-- End col-md-9-->

        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->

@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{asset('landing/js/cat_nav_mobile.js')}}"></script>
    <script>$('#cat_nav').mobileMenu();</script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="{{asset('landing/js/map.js')}}"></script>
    <script src="{{asset('landing/js/infobox.js')}}"></script>
    <script src="{{asset('landing/js/ion.rangeSlider.js')}}"></script>
    <script>
        $(function () {
            'use strict';
            $("#range").ionRangeSlider({
                hide_min_max: true,
                keyboard: true,
                min: 0,
                max: 15,
                from: 0,
                to: 5,
                type: 'double',
                step: 1,
                prefix: "Km ",
                grid: true
            });
        });
    </script>
    <script>
        function windowLoaded() {

        }
    </script>
@endsection


