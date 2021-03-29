@extends('layouts/contentLayoutMaster')

@section('title', 'Diet Tips')

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
        <div id="blog_list-parallax">
            <div class="bcg background3"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#blog_list-parallax"
            >
                <div class="bg-transparent">
                    <div class="banner-content">
                        <div class="container" >
                            <div class="slider-content  "> <i class="icon-home-ico"></i>
                                <h1>Diet Tips</h1>
                                <p>Food tips for healthy living</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>diet</li>
                                    <li>tips</li>
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
    <!-- Content
      ============================================= -->
    <div id="content">
        <!-- Blog list
        ============================================= -->
        <section class="blog_list text-left padding-100">
            <div class="container">
                <div class="row">
                    <!-- Blog main content -->
                    <div class="blog-main-content">
                    @foreach(\App\News::all() as $news)
                            <div class="blog_row">
                                <!-- Blog img -->
                                <figure class="blog-img col-md-6 col-sm-6 col-xs-12">

                                    <a href="blog_single_image.html"><img class="img-responsive" src="{{Storage::disk('news')->url($news->news_image)}}" alt="{{$news->news_image}}" /></a>
                                    <figcaption class="text-center"> <span class="btn btn-gold primary-bg white text-capitalize">
                                            {{date_format( date_create($news->news_date), 'd F Y')}}
                                          </span> </figcaption>
                                </figure>
                                <!-- Blog content -->
                                <div class="blog-content col-md-6 col-sm-6 col-xs-12">
                                    <h2><a href="blog_single_image.html">{{$news->news_heading}}</a></h2>
                                    <!-- Category -->
                                    <div class="category"> <i class="fa fa-picture-o"></i> EVENTS </div>
                                    <!--End Category -->
                                    <!-- Links -->
                                    <div class="links">
                                        <ul>
                                            <li> <a href="#"><i class="fa fa-user"></i> By Admin</a></li>
                                            <li><i class="fa fa-tags"></i> <a href="#">Food</a><span>,</span> <a href="#">Italian</a><span>,</span><a href="#">Cake </a></li>
                                            <li><a href="#"><i class="fa fa-heart"></i> 120</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 95</a></li>
                                        </ul>
                                    </div>
                                    <!-- End links -->
                                    <div class="text-content">
                                        <p>@php
                                                echo getTextSummary($news->news_description,200);
                                                @endphp</p>
                                        <a href="blog_single_image.html" class="btn btn-gold"  data-toggle="tooltip" data-placement="right" title="Read More"><i class="fa fa-arrow-right"></i></a> </div>
                                </div>
                                <!-- End Blog content -->
                                <!-- Divider -->
                                <div class="blog-divider"> <span></span> <i class="icon-home-ico"></i> <span></span> </div>
                                <!-- End# Divider -->
                            </div>
                    @endforeach
                        <!-- Blog row -->
                    </div>
                    <!-- End Blog main content -->
                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <ul class="majesty_pagination">
                            <li class="next"><a href="#">NEXT</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li class="previous"><a href="#">PREVIOUS</a></li>
                        </ul>
                    </div>
                    <!-- End Pagination -->
                </div>
            </div>
        </section>
        <!-- End blog list -->
    </div>
    <!-- end of #content -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


