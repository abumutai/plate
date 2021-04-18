@extends('layouts/contentLayoutMaster')

@section('title', 'Food Menu')

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
        <div id="menu-parallax">
            <div class="bcg background41"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#menu-parallax"
            >
                <div class="bg-transparent">
                    <div class="banner-content">
                        <div class="container" >
                            <div class="slider-content  "> <i class="icon-home-ico"></i>
                                <h1>Menu</h1>
                                <p>Your Taste is Our Goal</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>Menu Gird Three Column</li>
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
        <!-- Menu Grid
        ============================================= -->
        <div class="menu_grid our-menu text-center padding-b-70">
            <!-- Menu Bar -->
            <div class="menu-bar dark">
                <!-- menu Filter
                            ============================================= -->
                <ul id="menu-fillter" class="clearfix">
                    <li><a href="#" data-filter=".pf-daily-menu">dialy menu</a></li>
                    <li><a href="#" data-filter=".pf-starter">starter</a></li>
                    <li><a href="#" data-filter=".pf-dishes">dishes</a></li>
                    <li><a href="#" data-filter=".pf-desert">DESERT</a></li>
                    <li><a href="#" data-filter=".pf-drinks">DRINKS</a></li>
                </ul>
                <!-- #menu-filter end -->
            </div>
            <!-- End menu bar -->
            <!-- Menu Items
                          ============================================= -->
            <div class="container mt60">
                <!-- Menu Items Masonary Content -->
                <div id="menu-items" class="masonry-content menu-type dark clearfix" >
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label">best seller</span> <img src="img/menu/desert/desert1.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label">best seller</span> <img src="img/menu/desert/desert2.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <img src="img/menu/desert/desert3.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <img src="img/menu/desert/desert5.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-starter">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <img src="img/menu/starter/starter2.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-drinks pf-dishes">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label red">Spicy</span> <img src="img/menu/starter/starter3.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12  pf-daily-menu pf-starter">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label">best seller</span> <img src="img/menu/starter/starter4.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-dishes pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label">best seller</span> <img src="img/menu/starter/starter5.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-drinks pf-starter">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label red">Spicy</span> <img src="img/menu/starter/starter6.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-dishes pf-daily-menu">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label">best seller</span> <img src="img/menu/starter/starter4.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-drinks">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label red">Spicy</span> <img src="img/menu/starter/starter3.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-drinks pf-desert pf-dishes">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <img src="img/menu/starter/starter2.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-dishes pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label">best seller</span> <img src="img/menu/dishes/dishes1.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-dishes pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label">best seller</span> <img src="img/menu/dishes/dishes2.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-dishes pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label">best seller</span> <img src="img/menu/dishes/dishes3.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-dishes pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <span class="label red">Spicy</span> <img src="img/menu/dishes/dishes4.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-dishes pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <img src="img/menu/dishes/dishes5.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                    <!-- Menu Item -->
                    <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-dishes pf-desert">
                        <!-- Overlay Content -->
                        <div class="overlay_content overlay-menu">
                            <!-- Overlay Item -->
                            <div class="overlay_item"> <img src="img/menu/dishes/dishes6.jpg" alt="">
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
                    </article>
                    <!-- End Menu Item -->
                </div>
                <!-- End Menu Content -->
            </div>
            <!-- #menu end -->
            <a href="#" class="btn btn-gold mt30">View more</a> </div>
        <!-- End Menu Grid -->
    </div>
    <!-- end of #content -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


