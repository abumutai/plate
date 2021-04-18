    <?php
    $orders_count=0;
    use Carbon\Carbon;
    use App\Order;

   
    
    $user=auth()->user();
    $restaurant=$user->restaurant_profile;
    $orders=$user->restaurant_profile->orders;
                                


    $timezone = Carbon::now()->setTimezone('Africa/Nairobi');

    $today = Carbon::now()->startOfDay();
    $todayStartDate = $today->startOfDay()->format('Y-m-d H:i');
    $todayEndDate = $today->endOfDay()->format('Y-m-d H:i');
    //dd($todayEndDate);
    $week = Carbon::now()->startOfWeek();

    $weekStartDate = $today->startOfWeek()->format('Y-m-d H:i');
    $weekEndDate = $today->endOfWeek()->format('Y-m-d H:i');
    $monthStartDate = $today->startOfMonth()->format('Y-m-d H:i');
    $monthEndDate = $today->endOfMonth()->format('Y-m-d H:i');
    $yearStartDate = $today->startOfYear()->format('Y-m-d H:i');
    $yearEndDate = $today->endOfYear()->format('Y-m-d H:i');


    //Getting subsequent days
    $one = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today()->subDay(1))->count();
    $two = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today()->subDay(2))->count();
    $three = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today()->subDay(3))->count();
    $four = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today()->subDay(4))->count();
    $five = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today()->subDay(5))->count();
    $six = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today()->subDay(6))->count();
    $seven = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today()->subDay(7))->count();
    
    $orders_count = Order::where('restaurant_profile_id', $restaurant->id)->count();

    //Today's 
    $sales = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', [$todayStartDate, $todayEndDate])->count();
    $t_sales = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today())->get();
   
    $week_sale = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$weekStartDate, $today])->count();
    $t_week_sales = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$weekStartDate, $timezone])->get();

    $month_sale = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$monthStartDate, $today])->count();
    $t_month_sales = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$monthStartDate, $today])->get();

    $year_sale = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$yearStartDate, $today])->count();
    $t_year_sales = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$yearStartDate, $today])->get();

    //Pending orders
    $pending_orders = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',1)->whereDate('created_at', [$todayStartDate, $todayEndDate])->count();
    $p1 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',1)->whereDate('created_at', Carbon::today()->subDay(1))->count();
    $p2 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',1)->whereDate('created_at', Carbon::today()->subDay(2))->count();
    $p3 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',1)->whereDate('created_at', Carbon::today()->subDay(3))->count();
    $p4 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',1)->whereDate('created_at', Carbon::today()->subDay(4))->count();
    $p5 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',1)->whereDate('created_at', Carbon::today()->subDay(5))->count();
    $p6 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',1)->whereDate('created_at', Carbon::today()->subDay(6))->count();
    
    //processing orders
    $processing_orders = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',2)->whereDate('created_at', [$todayStartDate, $todayEndDate])->count();
    
    //completed orders
    $completed_orders = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',3)->whereDate('created_at', [$todayStartDate, $today])->count();;
    $c1 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',3)->whereDate('created_at', Carbon::today()->subDay(1))->count();
    $c2 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',3)->whereDate('created_at', Carbon::today()->subDay(2))->count();
    $c3 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',3)->whereDate('created_at', Carbon::today()->subDay(3))->count();
    $c4 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',3)->whereDate('created_at', Carbon::today()->subDay(4))->count();
    $c5 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',3)->whereDate('created_at', Carbon::today()->subDay(5))->count();
    $c6 = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',3)->whereDate('created_at', Carbon::today()->subDay(6))->count();

    //cancelled orders
    $cancelled_orders = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',4)->count();
   //dd($weekEndDate);
    //$completed_orders = Order::where('status', 1)->count();

             //Sales Reports
    /**Todays Sales Report */
    $total_sales= array();
    $weeksum = array();
    $monthsum= array();
    $yearsum= array();

    foreach($t_sales as $order){
        if($order->status == 3){
         $total_sales[] = $order->menu->pricing;

        }

    }

    foreach($t_week_sales as $order){
        if($order->status == 3){
         $weeksum[] = $order->menu->pricing;

        }

    }

    foreach($t_month_sales as $order){
        if($order->status == 3){
         $monthsum[] = $order->menu->pricing;

        }

    }

    foreach($t_year_sales as $order){
        if($order->status == 3){
         $yearsum[] = $order->menu->pricing;

        }

    }

   
    ?>

@extends('portal.layouts.restaurant_config')

@section('title', 'Dashboard')

@section('vendor-style')
{{-- vendor files --}}

@endsection
@section('page-style')

@endsection

@section('content')
<section class="content home">
    {{-- Include Page Content --}}
    <div class="block-header">
        <div class="row" style="color: #111;">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                    <small>Welcome back to sahani admin</small>
                </h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" style="color: #111" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#111">3,2,6,5,9,8,7,9,5,1,3,5,7,4,6
                    </div>
                    <small style="color: #111">Visitors</small>
                </div>
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#111">1,3,5,7,4,6,3,2,6,5,9,8,7,9,5
                    </div>
                    <small style="color: #111">Bounce Rate</small>
                </div>
                <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a style="color: #111;" href="{{route('landing')}}"><i class="zmdi zmdi-home"></i> Sahani</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>




    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="body">
                        <h6><strong>Orders</strong> Report</h6>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$pending_orders}}" data-speed="1000" data-fresh-interval="700">{{$orders_count}}</h2>
                                    <p class="text-muted">Pending Orders </p>
                                    <span id="linecustom1">{{$p6}},{{$p5}},{{$p4}},{{$p3}},{{$p2}},{{$p1}},{{$pending_orders}}</span>
                                    <a href="orders"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                </div>
                                <br>

                                @if (@$cancelled_orders <= 0)
                                    <div class="body" style="color:green">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$cancelled_orders}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted">Cancelled Orders</p>
                                        <a href="cancelled/orders"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @elseif ($cancelled_orders <=5)
                                    <div class="body" style="color: yellow;">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$cancelled_orders}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted">Cancelled Orders</p>
                                        <a href="cancelled/orders"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @else
                                    <div class="body" style="color:red;">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$cancelled_orders}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted">Cancelled Orders</p>
                                        <a href="cancelled/orders"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @endif

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                
                                @if ($sales >= 10)
                                    <div class="body" style="color: green;">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$sales}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted ">Total Orders Today</p>
                                        <span id="linecustom2">{{$seven}},{{$six}},{{$five}},{{$four}},{{$three}},{{$two}},{{$one}},{{$sales}}</span>
                                        <a href="today"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @elseif ($sales >=5)
                                    <div class="body" style="color: yellow;">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$sales}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted ">Total Orders Today</p>
                                        <span id="linecustom2">{{$seven}},{{$six}},{{$five}},{{$four}},{{$three}},{{$two}},{{$one}},{{$sales}}</span>
                                        <a href="today"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @else
                                    <div class="body" style="color: red;">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$sales}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted ">Total Orders Today</p>
                                        <span id="linecustom2">{{$seven}},{{$six}},{{$five}},{{$four}},{{$three}},{{$two}},{{$one}},{{$sales}}</span>
                                        <a href="today"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @endif  
                                <br>
                                <!--Processing Orders -->
                                @if ($processing_orders <= 5)
                                    <div class="body" style="color: green;">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$processing_orders}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted ">Processing Orders</p>
                                        <a href="orders"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @elseif ($processing_orders <= 10)
                                    <div class="body" style="color: yellow;">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$processing_orders}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted ">Processing Orders</p>
                                        <a href="orders"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @else
                                    <div class="body" style="color: red;">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$processing_orders}}" data-speed="2000" data-fresh-interval="700"></h2>
                                        <p class="text-muted ">Processing Orders</p>
                                        <a href="orders"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                    </div>
                                @endif

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$completed_orders}}" data-speed="2000" data-fresh-interval="700"></h2>
                                    <p class="text-muted">Completed Orders Today</p>
                                    <span id="linecustom3">{{$c6}},{{$c5}},{{$c4}},{{$c3}},{{$c2}},{{$c1}},{{$completed_orders}}</span>
                                    <a href="completed/orders"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                </div>
                                <br>

                                <div class="body">
                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$orders_count}}" data-speed="1000" data-fresh-interval="700">{{$orders_count}}</h2>
                                    <p class="text-muted">Restaurant's Total Orders </p>
                                    
                                    <a href="report"><span class="btn">View <i class="zmdi zmdi-eye" style="margin-left: 2px;"></i></span></a>
                                </div> 
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Sales</strong> Report</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown btn btn-default"><a href="javascript:void(0);" class="dropdown-toggle btn-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff;"> View More... </a>
                                <ul class="dropdown-menu slideUp float-right">
                                    <li><a href="today">Daily Report</a></li>
                                    <li><a href="weekly">Weekly Report</a></li>
                                    <li><a href="monthly">Monthly Report</a></li>
                                    <li><a href="receipts">View Voucher</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row text-center">
                            <div class="col-sm-3 col-6">
                                <h4 class="btn btn-info">Ksh. @php print_r(array_sum($total_sales)) @endphp <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted"> Today's Sales</p>
                            </div>
                          
                            <div class="col-sm-3 col-6">
                                <h4 class="btn btn-info">Ksh. @php print_r(array_sum($weeksum)) @endphp  <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">This Week's Sales</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="btn btn-info">Ksh. @php print_r(array_sum($monthsum)) @endphp <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">This Month's Sales</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="btn btn-info">Ksh. @php print_r(array_sum($yearsum)) @endphp  <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">This Year's Sales</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
              
        </div>


    </div>
</section>


@endsection
@section('vendor-script')

@endsection
@section('page-script')
@endsection