@extends('layouts/contentLayoutMaster')

@section('title', "Menu| ".$restaurant->title)

@section('vendor-style')
<!-- Vendor css files -->
@endsection
@section('page-style')
<!-- Page css files -->
<!-- Radio and check inputs -->
<link href="{{asset('landing/css/skins/square/grey.css')}}" rel="stylesheet">
<link href="{{asset('plugins/home/holdon/src/css/HoldOn.css')}}" rel="stylesheet">
<style>
    ul {
        padding: 0;
        list-style-type: none;
    }

    ul li {
        padding: .5em 0;
    }
</style>
@endsection
@section('content')
<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="{{asset($restaurant->banner)}}" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id="thumb">
                <a class="" href="{{route('pages.restaurants.profile',$restaurant)}}">
                    <img src="{{asset($restaurant->logo)}}" alt="">
                </a>
            </div>
            <div class="rating">
                @for($i=1;$i<=5;$i++) <i class="icon_star @if(calculateRating($restaurant)>=$i) voted @endif"></i>
                    @endfor
                    (<small><a href="{{route('pages.restaurants.profile',$restaurant)}}">Read {{$restaurant->ratings->count()}} reviews</a></small>)
            </div>
            <h1>{{$restaurant->title}}</h1>
            <div><em>{{$restaurant->headline}}</em></div>
            <div><i class="icon_pin"></i> {{$restaurant->location}} - <strong>Delivery Fee:</strong>
                {{$restaurant->delivery_fee}}
                <br>
                <div><i class="icon_hourglass"></i> {{$restaurant->opening_hours ?? '6 AM - 10 PM'}}

                    <br>
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

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        <div class="col-md-3">
            <p><a href="{{route('pages.restaurants')}}" class="btn_side">Back to search</a></p>
            <div class="box_style_1">
                <ul id="cat_nav">
                    {{--TODO class="active"--}}
                    @foreach(\App\Category::all() as $category)
                    <li><a href="#{{combineText($category->title,'_')}}">{{$category->title}} <span>({{$restaurant->menus->where('category_id',$category->id)->count()}})</span></a>
                    </li>
                    @endforeach
                </ul>
            </div><!-- End box_style_1 -->

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Have <span>Inquiry?</span></h4>
                <a href="tel://{{$restaurant->phone}}" class="phone">{{$restaurant->phone}}</a>
                <a href="mailto://{{$restaurant->email}}" class="email">{{$restaurant->email}}</a>

                <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>
        </div><!-- End col-md-3 -->

        <div class="col-md-6">
            <div class="box_style_2" id="main_menu">
                <h2 class="inner">Menu</h2>
                @php
                $count=0
                @endphp
                @foreach(\App\Category::all() as $category)
                <h3 id="{{combineText($category->title,'_')}}">{{$category->title}}</h3>
                <p>{{$category->description}}</p>
                <table class="table table-striped cart-list">
                    <thead>
                        <tr>
                            <th>
                                Item
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Order
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($restaurant->menus->where('category_id',$category->id) as $menu)

                        <tr class="">
                            <td>
                                <figure class="thumb_menu_list">
                                    <img src="{{getMenuImage($menu)}}" alt="thumb">
                                </figure>
                                <h5>{{$count++}}. {{$menu->title}}</h5>
                                <p>
                                    {{$menu->description}}
                                </p>
                            </td>
                            <td>
                                <strong>{{$menu->currency}} {{$menu->pricing}}</strong>
                            </td>
                            <td class="options">
                                <div class="dropdown dropdown-options">
                                    <a href="" @guest data-toggle="modal" data-target="#login_2" @else class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" @endguest><i class="icon_plus_alt2"></i></a>
                                    <form class="dropdown-menu addCartForm" name="addCartForm" id="addCartForm" method="get" action="{{route('cart.add',$menu)}}">
                                        <h5>Select an option</h5>
                                        <input type="hidden" name="menu_id" value="{{$menu->id}}">
                                        <label>
                                            <input type="radio" value="" name="menu_size_id" checked>Normal
                                            <span>+ Ksh 0</span>
                                        </label>
                                        @foreach($menu->menu_sizes as $sz)
                                        <label>
                                            <input type="radio" value="{{$sz->id}}" name="menu_size_id">{{$sz->size->title}}
                                            <span>+ Ksh {{$sz->pricing}}</span>
                                        </label>
                                        @endforeach

                                        @if($menu->menu_ingredients->count()>0)
                                        <h5>Add ingredients</h5>
                                        @foreach($menu->menu_ingredients as $ing)

                                        <label>
                                            <input class="ingredient_check" name="menu_ingredients[]" type="checkbox" value="{{$ing->id}}">{{$ing->ingredient->title}}
                                            <span>+ Ksh {{$ing->ingredient->pricing}}</span>
                                        </label>
                                        @endforeach
                                        @endif
                                        <button class="add_to_basket" type="submit">Add to cart</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if($restaurant->menus->where('category_id',$category->id)->count()<1) <tr>
                            <td colspan="2">No items available</td>
                            </tr>
                            @endif
                    </tbody>
                </table>
                <hr>
                @endforeach
            </div><!-- End box_style_1 -->
        </div><!-- End col-md-6 -->

        <div class="col-md-3" id="sidebar">
            <div class="theiaStickySidebar">
                <form id="cart_box" action="{{route('cart.complete',$restaurant)}}" method="post">
                    @csrf
                    @php
                    $subtotal=0;
                    @endphp
                    <h3>Your order(s)<i class="icon_cart_alt pull-right"></i></h3>
                    <div>
                        @auth
                        @php
                        $orders=App\TempOrder::where([['user_id','=',$user->id],['restaurant_profile_id','=',$restaurant->id]])->get()->unique('menu_id')
                        @endphp
                        <ul>
                            @foreach($orders as $temp)
                            <li>
                                <div class="row">

                                        <div class="col-md-8">

                                            <a href="{{ action('MenuController@deleteCart', $temp->id) }}" id="remove_item" class="remove_item"><i class="icon_minus_alt"></i></a>
                                          
                                            <strong>{{\App\TempOrder::where('menu_id', $temp->menu_id)->get()->count()}}
                                            </strong>
                                            {{$temp->menu->title}}

                                        </div>
                                      
                                            <div class="col-md-4">
                                                {{$temp->menu->currency}} {{$temp->menu->pricing}}
                                                @php
                                                $subtotal+=\App\TempOrder::where('menu_id', $temp->menu_id)->get()->count()*$temp->menu->pricing;
                                                @endphp
                                            </div>
                                            <div class="col-md-11 col-lg-offset-1">
                                                <ul>
                                                    @php
                                                    $pickedIngredients=collect();
                                                    @endphp
                                                    @foreach(\App\TempOrder::where('menu_id', $temp->menu_id)->get() as $ord)
                                                    @foreach($ord->temp_ingredients as $ing)
                                                    @php
                                                    $pickedIngredients->add($ing);
                                                    @endphp
                                                    @endforeach
                                                    @endforeach

                                                    @foreach($pickedIngredients->unique('menu_ingredient_id') as $pk)
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <a href="#0" class="remove_item"><i class="icon_minus_alt"></i></a>
                                                                <strong> {{$pickedIngredients->where('menu_ingredient_id',$pk->menu_ingredient_id)->count()}}
                                                                    x</strong>
                                                                {{$pk->menu_ingredient->ingredient->title}}
                                                            </div>
                                                            <div class="col-md-4">
                                                                {{$temp->menu->currency}} {{$pk->menu_ingredient->ingredient->pricing}}
                                                                @php
                                                                $subtotal+=$pickedIngredients->where('menu_ingredient_id',$pk->menu_ingredient_id)->count()*$pk->menu_ingredient->ingredient->pricing;
                                                                @endphp
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @foreach(\App\TempOrder::where('menu_id', $temp->menu_id)->get()->unique('menu_size_id') as $ord)
                                            @if($ord->menu_size!=null)
                                            <div class="col-md-10 col-lg-offset-2">
                                                <ul>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <strong> {{\App\TempOrder::where([['menu_size_id','=',$ord->menu_size_id],['menu_id','=',$ord->menu_id]])->get()->count()}}
                                                                    x</strong>
                                                                {{$ord->menu_size->size->title}}
                                                            </div>
                                                            <div class="col-md-4">
                                                                {{$temp->menu->currency}} {{$ord->menu_size->pricing}}
                                                                @php
                                                                $subtotal+=\App\TempOrder::where([['menu_size_id','=',$ord->menu_size_id],['menu_id','=',$ord->menu_id]])->get()->count()*$ord->menu_size->pricing;
                                                                @endphp
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                            @endforeach
                                </div>

                            </li>

                            @endforeach
                            @if($orders->count()<1) <li class="text-center" style="color: #6c757d !important;"> You have no Orders
                                </li>
                                @endif
                        </ul>
                        @else
                        <div class="w-100 text-center" style="color: rebeccapurple">
                            Login to make an order
                        </div>
                        @endauth
                    </div>
                    <hr>
                    <div class="row" id="options_2">
                        @foreach($restaurant->restaurant_services as $service)
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <label><input type="radio" value="{{$service->id}}" name="restaurant_service_id" required class="icheck">{{$service->service->title}}</label>
                        </div>

                        @endforeach
                    </div><!-- Edn options 2 -->
                    <hr>
                    @auth
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col-md-6">Subtotal</div>
                                <div class="col-md-6 text-right">
                                    Ksh {{$subtotal}}
                                </div>
                            </div>
                        </li>
                        <!-- <li>
                                    <div class="row">
                                        <div class="col-md-6">Delivery Fee</div>
                                        <div class="col-md-6 text-right">
                                            Ksh 400
                                        </div>
                                    </div>
                                </li> -->
                        <li>
                            <div class="row">
                                <div class="col-md-6 text-uppercase" style="font-weight:800!important;font-size:20px">Total
                                </div>
                                <div class="col-md-6 text-right" style="font-weight:800!important;font-size:20px">
                                    Ksh {{$subtotal}}
                                </div>
                            </div>
                        </li>
                    </ul>

                    @if($orders->count()>0)

                    <button type="submit" class="btn_full">Order now</button>
                    @endif
                    @endauth
                </form><!-- End cart_box -->
            </div><!-- End theiaStickySidebar -->
        </div><!-- End col-md-3 -->

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
<script>
    $('#cat_nav').mobileMenu();
</script>
<script src="{{asset('landing/js/theia-sticky-sidebar.js')}}"></script>
<script src="{{asset('plugins/home/holdon/src/js/HoldOn.js')}}"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 80
    });
</script>
<script>
    $('#cat_nav a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 70
        }, 900, 'swing', function() {
            window.location.hash = target;
        });
    });
</script>

<script>
    $("#remove_item").click(function() {
        $("#deleteCartForm").submit();
    });
</script>

<script>
    function actionSnack() {
        //creating a snackbar
        const snackbar = new SnackBar;
        snackbar.make("message", ["Unable to connect the server", null, "bottom", "center"], 5000);
    }
</script>

<script>
    function snackBar(message) {
        const snackbar = new SnackBar;
        snackbar.make("message", [message, null, "bottom", "center"], 3000);
    }

    $('.addCartForm').submit(function(event) {
        // $(this).dropdown('toggle');

        $.ajax({
            type: "GET",
            data: $(this).serializeArray(),
            url: $(this).attr('action'),
            success: function(data) {
                let resp = JSON.parse(data);
                snackBar(resp.message);
                $("#cart_box").load(" #cart_box > *");
            },
            error: function(data) {
                console.log(data);
                snackBar('Error adding item to cart');
            }

        });
        event.preventDefault();
    })
</script>

<script>
    function windowLoaded() {
        @if(session('message'))
        const snackbar = new SnackBar;
        snackbar.make("message", ["{{session('message')}}", null, "bottom", "center"], 5000);
        @endif
    }

    function proceedOrder() {
        HoldOn.open({
            theme: 'sk-fading-circle',
            message: "<h4>Sending Order</h4>"
        });

    }
</script>
@endsection