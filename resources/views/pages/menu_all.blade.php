@extends('layouts/contentLayoutMaster')

@section('title', 'Menu Categories')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
@endsection
@section('content')
    !-- banner
    ============================================= -->
    <section class="banner about dark">
        <div id="service-parallax">
            <div class="bcg background6"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#service-parallax"
            >
                <div class="bg-transparent">
                    <div class="banner-content">
                        <div class="container">
                            <div class="slider-content  "><i class="icon-home-ico"></i>
                                <h1>Delicious Foods Menu</h1>
                                <p>Everything you want, you will find on Sahani</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>menu</li>
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
        <!-- Content -->
        <div class="padding-100">
            <div class="container">
                <div class="row">
                    <!--  Menu -->
                    <div class="col-md-2 col-sm-4 side-bar">
                        <aside class="menu-list">
                            <div class="recent-posts ">
                                <h3><span>MENU</span> CATEGORIES</h3>
                                <span class="sidebar_divider"></span>
                                <nav>
                                    @php
                                        $count=0;
                                    @endphp
                                    <ul class="" role="tablist">
                                        @foreach(\App\Category::all() as $category)
                                            <li class="nav-item"><a class="nav-link @if($count==0) active @endif "
                                                                    id="category-{{$category->id}}-tab-end"
                                                                    data-toggle="tab"
                                                                    href="#category-{{$category->id}}-tab"
                                                                    aria-controls="category-{{$category->id}}-tab"
                                                                    role="tab"
                                                                    aria-selected="true">{{$category->name}}</a>
                                            </li>
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </aside>
                    </div>
                    <!-- End# Menu -->
                    <!-- Shortcodes -->
                    <div class="col-md-10 col-sm-8">
                        @php
                            $count=0;
                        @endphp
                        <div class="tab-content">
                            @foreach(\App\Category::all() as $category)
                                <div class="tab-pane  @if($count==0) active @endif" id="category-{{$category->id}}-tab"
                                     aria-labelledby="category-{{$category->id}}-tab-end"
                                     role="tabpanel">
                                    <!-- Menu Items Masonary Content -->
                                    <div id="menu-items" class="text-left padding-t-100">
                                    @foreach(\App\Menu::where('category_id',$category->id)->get() as $menu)
                                        <!-- Menu Item -->
                                            <article
                                                class="menu-item-list col-md-6 col-sm-12 pf-daily-menu pf-starter pf-desert">
                                                <div class="item-img">
                                                    <div class="overlay_content">
                                                        <!-- Overlay Item -->
                                                        <div class="overlay_item"><img
                                                                src="{{$menu->image}}"
                                                                alt="">
                                                            <!-- Overlay -->
                                                            <div class="overlay">
                                                                <!-- Icons -->
                                                                <div class="icons">
                                                                    <!-- Buttons -->
                                                                    <div class="button"><a
                                                                            href="img/menu/breakfast_1.jpg"
                                                                            rel="lightbox"><i
                                                                                class="fa fa-expand"></i></a> <a
                                                                            href="#"><i
                                                                                class="fa fa-shopping-cart"></i></a>
                                                                    </div>
                                                                    <!-- End Buttons -->
                                                                    <a class="close-overlay hidden">x</a></div>
                                                                <!-- End Icons -->
                                                            </div>
                                                            <!-- End Overlay -->
                                                        </div>
                                                        <!-- End Overlay Item -->
                                                    </div>
                                                </div>
                                                <h3 class="d-flex justify-content-between"><a
                                                        href="menu_single.html">{{$menu->title}} </a> <span
                                                        class="price">{{$menu->currency}} {{$menu->pricing}}</span></h3>
                                                <p>{{$menu->description}}</p>
                                            </article>
                                            <!-- End Menu Item -->
                                        @endforeach
                                    </div>
                                </div>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        </div>
                        <!-- End Menu Content -->
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </div>
    <!-- End #content -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


