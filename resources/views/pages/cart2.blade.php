@extends('layouts/contentLayoutMaster')

@section('title', 'Restaurants/Hotels')

@section('vendor-style')
<!-- Vendor css files -->
@endsection
@section('page-style')
<!-- Page css files -->
<!-- Radio and check inputs -->
<link href="{{asset('landing/css/skins/square/grey.css')}}" rel="stylesheet">
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
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="landing/img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">
            <h1>Place your order</h1>
            <div class="bs-wizard">
                <div class="col-xs-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Your details</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="cart.html" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Payment</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="cart_2.html" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum"><strong>3.</strong> Finish!</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#0" class="bs-wizard-dot"></a>
                </div>
            </div><!-- End bs-wizard -->
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
        <div class="col-md-offset-3 col-md-6">
            <div class="box_style_2">
                <h2 class="inner">Order confirmed!</h2>
                <div id="confirm">
                    <i class="icon_check_alt2"></i>
                    <h3>Thank you!</h3>

                </div>
                <h4>Summary</h4>
                @php
                $subtotal=0;
                @endphp
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
                                    <a href="#0" class="remove_item"><i class="icon_check"></i></a>
                                    <strong>{{\App\TempOrder::where('menu_id', $temp->menu_id)->get()->count()}}
                                        x</strong>
                                    {{$temp->menu->title}}
                                </div>
                                <div class="col-md-4 text-right">
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
                                                    <a href="#0" class="remove_item"><i class="icon_check_alt2"></i></a>
                                                    <strong> {{$pickedIngredients->where('menu_ingredient_id',$pk->menu_ingredient_id)->count()}}
                                                        x</strong>
                                                    {{$pk->menu_ingredient->ingredient->title}}
                                                </div>
                                                <div class="col-md-4 text-right">
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
                                                <div class="col-md-4 text-right">
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
                                <p>
                                    You have earned @php echo ($subtotal*.1)/100;
                                    @endphp Kula point
                                </p>
                            </div>
                        </li>
                        @endforeach
                        @if($orders->count()<1) <li class="text-center" style="color: #6c757d !important;"> No orders made so
                            far
                            </li>
                            @endif
                    </ul>
                    @else
                    <div class="w-100 text-center" style="color: rebeccapurple">
                        Login to make an order
                    </div>
                    @endauth
                </div>

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
                   
               
                    @if($restaurant_service->service_id==2)

                    <div class="row">
                        <div class="col-md-6">Delivery Fee</div>
                        <div class="col-md-6 text-right">
                            Ksh {{$restaurant->delivery_fee}}
                            @php
                            $subtotal+= $restaurant->delivery_fee;
                            @endphp

                        </div>
                    </div>

                    @else
                    <div class="row">

                    </div>
                    @endif
                    <!-- <li>
                                <div class="row">
                             
                                    <div class="col-md-6">Delivery Fee</div>
                                    <div class="col-md-6 text-right">
                                    {{$restaurant->delivery_fee}}
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
                @endauth
            </div>
        </div>
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

@endsection

@section('vendor-script')
<!-- Vendor js files -->

@endsection
@section('page-script')

@endsection