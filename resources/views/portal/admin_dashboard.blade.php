@extends('portal.layouts.contentLayoutMaster2')

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
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                    <small>Welcome Super admin</small>
                </h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#fff">3,2,6,5,9,8,7,9,5,1,3,5,7,4,6
                    </div>
                    <small class="col-white">Visitors</small>
                </div>
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#fff">1,3,5,7,4,6,3,2,6,5,9,8,7,9,5
                    </div>
                    <small class="col-white">Bounce Rate</small>
                </div>
                <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('landing')}}"><i class="zmdi zmdi-home"></i> Sahani</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    @php
    $orders_count=0;
    $total_sales=0;
    $total_profit=0;
    $weeklysum = 0;
    use Carbon\Carbon;
    $today = Carbon::now()->setTimezone('Africa/Nairobi');
    $now = Carbon::now();

    $weekStartDate = $today->startOfWeek()->format('Y-m-d H:i');
    $weekEndDate = $today->endOfWeek()->format('Y-m-d H:i');
    use App\Order;
    use App\RestaurantProfile;
    use App\User;



    $restautants_count = RestaurantProfile::all()->count();

    $orders_count = Order::all()->count();
  
    $users = User::where('role_id',3)->count();


    $sales = Order::with('menu')->whereDate('created_at', Carbon::today())->get();
   

    $completed_orders = Order::with('menu')->whereDate('created_at', Carbon::today())->where('Status',3)->count();
   // dd($now);

   
    @endphp




    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$restautants_count}}" data-speed="1000" data-fresh-interval="700">{{$restautants_count}}</h2>


                                    <p class="text-muted">Total Restaurants </p>
                                    <span id="linecustom1">1,4,2,6,5,2,3,8,5,2</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <!-- <div class="body">
                                
                                <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{0}}" data-speed="2000" data-fresh-interval="700">3</h2>
                                <p class="text-muted ">Total Sales Todays</p>
                                <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                            </div>       -->
                             

                              
                                <div class="body">

                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$orders_count}}" data-speed="2000" data-fresh-interval="700">{{$orders_count}}</h2>
                                    <p class="text-muted ">Total Orders</p>
                                    <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                                </div>
                            

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$users}}" data-speed="2000" data-fresh-interval="700">{{$users}}</h2>
                                    <p class="text-muted">Total Customers</p>
                                    <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
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
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu slideUp float-right">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
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
                                <h4 class="margin-0">Ksh {{$weeklysum}} <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted"> Today's Sales</p>
                            </div>
                          
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">Ksh {{$weeklysum}} <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">This Week's Sales</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">Ksh 0 <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">This Month's Sales</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">Ksh 0 <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">This Year's Sales</p>
                            </div>
                        </div>
                        <div id="area_chart" class="graph"></div>
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