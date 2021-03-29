@extends('layouts/contentLayoutMaster')

@section('title', 'Wishlist')

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
        <div id="wishlist-parallax">
            <div class="bcg background39"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#wishlist-parallax"
            >
                <div class="bg-transparent">
                    <div class="banner-content">
                        <div class="container" >
                            <div class="slider-content  "> <i class="icon-home-ico"></i>
                                <h1>Wishlist</h1>
                                <p>Every Thing You Know About Sahani</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>Wishlist</li>
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
        <!-- Wishlist
        ============================================= -->
        <div class="wishlist text-center padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Table wishlist -->
                        <table class="table table-striped table-responsive table-cart">
                            <thead>
                            <tr>
                                <th style="width:30%">Product Image</th>
                                <th style="width:15%">Unit Price</th>
                                <th style="width:15%">Stock Status</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="menu_single"><img src="landing/img/carts/1.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><span class="outstock">Out of Stock</span></td>
                                <td><button type="button" class="btn btn-black"> Add to cart</button></td>
                                <td><a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="menu_single"><img src="landing/img/carts/2.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><span class="instock">In Stock</span></td>
                                <td><button type="button" class="btn btn-black"> Add to cart</button></td>
                                <td><a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="menu_single"><img src="landing/img/carts/3.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><span class="instock">In Stock</span></td>
                                <td><button type="button" class="btn btn-black"> Add to cart</button></td>
                                <td><a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="menu_single"><img src="landing/img/carts/4.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><span class="instock">In Stock</span></td>
                                <td><button type="button" class="btn btn-black"> Add to cart</button></td>
                                <td><a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="menu_single"><img src="landing/img/carts/5.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><span class="instock">In Stock</span></td>
                                <td><button type="button" class="btn btn-black"> Add to cart</button></td>
                                <td><a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- End Table wishlist  -->
                        <!-- Social share -->
                        <div class="social-share">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i> Share</a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i> Pin</a></li>
                            </ul>
                        </div>
                        <!-- Social share -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End wishlist -->
        <!-- Interest
        ============================================= -->
        <section class="interest-in padding-100 text-center">
            <div class="container">
                <div class="row">
                    <h1>MAY BE YOU INTEREST IN</h1>
                    <!-- Menu type -->
                    <div class="menu-type dark">
                        <!-- Item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 item">
                            <!-- Overlay Content -->
                            <div class="overlay_content overlay-menu">
                                <!-- Overlay Item -->
                                <div class="overlay_item"> <span class="label">best seller</span> <img src="landing/img/menu/starter/starter1.jpg" alt="">
                                    <!-- Overlay -->
                                    <div class="overlay">
                                        <!-- Icons -->
                                        <div class="icons">
                                            <h3>Food Name</h3>
                                            <h3> $79.99</h3>
                                            <!-- Rating -->
                                            <fieldset class="rating">
                                                <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                                            </fieldset>
                                            <!-- End Rating -->
                                            <!-- Buttons -->
                                            <div class="button"> <a class="btn btn-gold" href="#"><i class="fa fa-shopping-cart"></i></a> <a class="btn btn-gold" href="menu_single.html"><i class="fa fa-link"></i></a> </div>
                                            <!-- End Buttons -->
                                            <a class="close-overlay hidden">x</a> </div>
                                        <!-- End Icons -->
                                    </div>
                                    <!-- End Overlay -->
                                </div>
                                <!-- End Overlay Item -->
                            </div>
                            <!-- End Overlay Content -->
                        </div>
                        <!-- End item -->
                        <!-- Item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 item">
                            <!-- Overlay Content -->
                            <div class="overlay_content overlay-menu">
                                <!-- Overlay Item -->
                                <div class="overlay_item"> <span class="label red">Spicy</span> <img src="landing/img/menu/starter/starter3.jpg" alt="">
                                    <!-- Overlay -->
                                    <div class="overlay">
                                        <!-- Icons -->
                                        <div class="icons">
                                            <h3>Food Name</h3>
                                            <h3> $79.99</h3>
                                            <!-- Rating -->
                                            <fieldset class="rating">
                                                <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                                            </fieldset>
                                            <!-- End Rating -->
                                            <!-- Buttons -->
                                            <div class="button"> <a class="btn btn-gold" href="#"><i class="fa fa-shopping-cart"></i></a> <a class="btn btn-gold" href="menu_single.html"><i class="fa fa-link"></i></a> </div>
                                            <!-- End Buttons -->
                                            <a class="close-overlay hidden">x</a> </div>
                                        <!-- End Icons -->
                                    </div>
                                    <!-- End Overlay -->
                                </div>
                                <!-- End Overlay Item -->
                            </div>
                            <!-- End Overlay Content -->
                        </div>
                        <!-- End item -->
                        <!-- Item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 item">
                            <!-- Overlay Content -->
                            <div class="overlay_content overlay-menu">
                                <!-- Overlay Item -->
                                <div class="overlay_item"><img src="landing/img/menu/starter/starter4.jpg" alt="">
                                    <!-- Overlay -->
                                    <div class="overlay">
                                        <!-- Icons -->
                                        <div class="icons">
                                            <h3>Food Name</h3>
                                            <h3> $79.99</h3>
                                            <!-- Rating -->
                                            <fieldset class="rating">
                                                <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                                            </fieldset>
                                            <!-- End Rating -->
                                            <!-- Buttons -->
                                            <div class="button"> <a class="btn btn-gold" href="#"><i class="fa fa-shopping-cart"></i></a> <a class="btn btn-gold" href="menu_single.html"><i class="fa fa-link"></i></a> </div>
                                            <!-- End Buttons -->
                                            <a class="close-overlay hidden">x</a> </div>
                                        <!-- End Icons -->
                                    </div>
                                    <!-- End Overlay -->
                                </div>
                                <!-- End Overlay Item -->
                            </div>
                            <!-- End Overlay Content -->
                        </div>
                        <!-- End item -->
                    </div>
                    <!--End Menu type -->
                </div>
            </div>
        </section>
        <!-- End Interest -->
    </div>
    <!-- end of #content -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


