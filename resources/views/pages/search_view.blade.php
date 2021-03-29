@extends('layouts/contentLayoutMaster')

@section('title', 'Search results')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <link href="{{asset('landing/css/skins/square/grey.css')}}" rel="stylesheet">
    <link href="{{asset('landing/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('landing/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

@endsection
@section('content')

    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_short.jpg"
             data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
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
                         {{--   <a href="grid_list.html" class="bt_filters"><i class="icon
                         -th"></i></a>--}}
                        </div>
                    </div>
                </div><!--End tools -->

                @php
                    $count=0;
                @endphp
                @foreach($menus as $menu)
                    <div class="strip_list wow fadeIn" data-wow-delay="{{$count+=.1}}s">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <div class="desc">
                                    <div class="thumb_strip">
                                        <a href="{{route('pages.restaurants.menu',$menu->restaurant_profile)}}#{{combineText($menu->category->title)}}">
                                            <img
                                                src="{{getMenuImage($menu)}}" alt=""></a>
                                    </div>
                                    <div class="rating">
                                        <a href="" style="visibility: hidden">In stock</a>
                                    </div>
                                    <h3>{{$menu->title}}</h3>
                                    <div class="row w-100" style="padding-left: .5em">
                                       <div class="col-md-3">
                                           {{$menu->category->title}}
                                       </div>
                                        <div class="col-md-9">
                                            {{$menu->getFullPricingAttribute()}}
                                        </div>
                                    </div>
                                    <div class="location">
                                        {{$menu->description}}
                                    </div>
                                    <ul style="padding-top: 1em">
                                        @foreach(\App\Service::all() as $service)
                                            <li>
                                                {{$service->title}}<i
                                                    class="@if($menu->restaurant_profile->restaurant_services->where('service_id',$service->id)->first()) icon_check_alt2 ok @else icon_close_alt2 no @endif"></i>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="go_to">
                                    <div>
                                        <a href="{{route('pages.restaurants.menu',$menu->restaurant_profile)}}#{{combineText($menu->category->title)}}" class="btn_1">View Item</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End row-->
                    </div>
                @endforeach
               @if($menus->count()<1)
                    <div class="strip_list wow fadeIn" data-wow-delay="{{$count+=.1}}s">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div> Sorry, search item not found</div>
                                <div style="padding: 2em!important;"><img src="{{asset('found')}}" alt="sorry"></div>
                            </div>
                        </div><!-- End row-->
                    </div>
                   @endif

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
@endsection


