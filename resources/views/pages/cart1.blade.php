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
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset($restaurant->banner)}}"
             data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Place your order</h1>
                <div class="bs-wizard">
                    <div class="col-xs-4 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Your details</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-xs-4 bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Payment</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="{{route('cart2')}}" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-xs-4 bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum"><strong>3.</strong> Finish!</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="{{route('cart3')}}" class="bs-wizard-dot"></a>
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
            <div class="col-md-3">

                <div class="box_style_2 hidden-xs" id="help">
                    <i class="icon_lifesaver"></i>
                    <h4>Have <span>Inquiry?</span></h4>
                    <a href="tel://{{$restaurant->phone}}" class="phone">{{$restaurant->phone}}</a>
                    <a href="mailto://{{$restaurant->email}}" class="email">{{$restaurant->email}}</a>

                    <small>Monday to Friday 9.00am - 7.30pm</small>
                </div>

            </div><!-- End col-md-3 -->

            <div class="col-md-6">
                <form action="{{route('order.step3',$restaurant)}}" method="get" class="box_style_2" id="order_process">
                    <h2 class="inner">Your order details</h2>
                
                @if($restaurant_service->service->id==3)<!--dine in-->
                    <div class="py-2">
                        <p style="font-size: 20px">Hey  {{$user->name}}, please select your table</p>
                        <div class="my-2 row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select table</label>
                                    <select class="form-control" name="table_id" id="table_id" required>
                                        <option value="" selected>Select..</option>
                                        @foreach($restaurant->tables as $table)
                                            <option value="{{$table->id}}">{{$table->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($restaurant_service->service->id==2)
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="full_name" value="{{$user->name??old('name')}}" name="full_name"
                                   placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email??old('email')}}"
                                   placeholder="email">
                        </div>
                        <div class="form-group">
                            <label>Telephone/mobile</label>
                            <input type="text" id="phone" name="phone" value="{{$user->phone??old('phone')}}" class="form-control"
                                   placeholder="Telephone/mobile">
                        </div>
                        <!-- <div class="form-group">
                            <label>Address</label>
                            <input type="address" id="address" name="address" class="form-control"
                                   placeholder="address">
                        </div> -->
                        <!-- <div class="form-group">
                            <label>Your Estate</label>
                            <input type="text" id="estate" name="estate" class="form-control"
                                   placeholder=" Your full estate name">
                        </div> -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" id="city" name="city" class="form-control"
                                           placeholder=" Your  city">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Estate</label>
                                    <input type="text" id="estate" name="estate" class="form-control"
                                           placeholder=" Your  estate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Apartment/House/Block Name</label>
                                    <input type="text" id="house" name="house" class="form-control"
                                           placeholder="apartment /house">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>House No</label>
                                    <input type="text" id="house_no" name="house_no" class="form-control"
                                           placeholder=" Your House No">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Delivery Day</label>
                                    <select class="form-control" name="delivery_schedule_day"
                                            id="delivery_schedule_day">
                                        <option value="" selected>Select day</option>
                                        <option value="Today">Today</option>
                                        <option value="Tomorrow">Tomorrow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Delivery time</label>
                                    <select class="form-control" name="delivery_schedule_time"
                                            id="delivery_schedule_time">
                                        <option value="" selected>Select time</option>
                                        <option value="11.30am">11.30am</option>
                                        <option value="11.45am">11.45am</option>
                                        <option value="12.15am">12.15am</option>
                                        <option value="12.30am">12.30am</option>
                                        <option value="12.45am">12.45am</option>
                                        <option value="01.00pm">01.00pm</option>
                                        <option value="01.15pm">01.15pm</option>
                                        <option value="01.30pm">01.30pm</option>
                                        <option value="01.45pm">01.45pm</option>
                                        <option value="02.00pm">02.00pm</option>
                                        <option value="07.00pm">07.00pm</option>
                                        <option value="07.15pm">07.15pm</option>
                                        <option value="07.30pm">07.30pm</option>
                                        <option value="07.45pm">07.45pm</option>
                                        <option value="08.00pm">08.00pm</option>
                                        <option value="08.15pm">08.15pm</option>
                                        <option value="08.30pm">08.30pm</option>
                                        <option value="08.45pm">08.45pm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endif

                    <div class="row">
                        <div class="col-md-12">

                            <label>Notes for the restaurant</label>
                            <textarea class="form-control" style="height:150px"
                                      placeholder="Ex. Allergies, cash change..." name="note" id="note"></textarea>

                        </div>
                    </div>
                </form><!-- End box_style_1 -->
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
                                                    <a href="#0" class="remove_item"><i
                                                            class="icon_check"></i></a>
                                                    <strong>{{\App\TempOrder::where('menu_id', $temp->menu_id)->get()->count()}}
                                                        x</strong>
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
                                                                        <a href="#0" class="remove_item"><i
                                                                                class="icon_check_alt2"></i></a>
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
                                                                            {{$temp->menu->currency}}  {{$ord->menu_size->pricing}}
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
                                    @if($orders->count()<1)
                                        <li class="text-center" style="color: #6c757d !important;"> No orders made so
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
                        <hr>
                        <!-- <div class="row" id="options_2">
                            @foreach($restaurant->restaurant_services as $service)
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <label><input type="radio" value="{{$service->id}}" name="restaurant_service_id"
                                                  required
                                                  class="icheck" disabled
                                                  @if($restaurant_service->id==$service->id) checked @endif>{{$service->service->title}}
                                    </label>
                                </div>

                            @endforeach
                        </div> -->
                        
                        <!-- Edn options 2 -->
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
                                <li>
                                   
                                @if($restaurant_service->service->id==2)
                                                                
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
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-6 text-uppercase"
                                             style="font-weight:800!important;font-size:20px">Total
                                        </div>
                                        <div class="col-md-6 text-right"
                                             style="font-weight:800!important;font-size:20px">
                                            Ksh {{$subtotal}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @if($orders->count()>0)
                                <a class="btn_full" onclick="submitForm()">Go to checkout</a>
                                <a class="btn_full_outline" href="{{route('pages.restaurants.menu',$restaurant)}}"><i
                                        class="icon-right"></i> Add other
                                    items</a>
                            @endif
                        @endauth
                    </form><!-- End cart_box -->
                    <!-- End cart_box -->
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
    <script src="{{asset('js/theia-sticky-sidebar.js')}}"></script>
    <script>
        jQuery('#sidebar').theiaStickySidebar({
            additionalMarginTop: 80
        });
    </script>

    <script>
        function submitForm() {
            $("#order_process").submit();
        }
    </script>
@endsection


