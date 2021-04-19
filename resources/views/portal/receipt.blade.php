
@extends('portal.layouts.restaurant_config')

@section('title', 'Payments')

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
                    <small>Confirm Payments Of The customers</small>
                </h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#111">3,2,6,5,9,8,7,9,5,1,3,5,7,4,6
                    </div>
                    <small class="col-black">Visitors</small>
                </div>
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#111">1,3,5,7,4,6,3,2,6,5,9,8,7,9,5
                    </div>
                    <small class="col-black">Bounce Rate</small>
                </div>
                <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="" class="col-black"><i class="zmdi zmdi-home"></i> Sahani</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>

</div>

<div class="container bootdey">
<div class="row invoice row-printable">
    <div class="col-md-10">
        <!-- col-lg-12 start here -->
        <div class="panel panel-default plain" id="dash_0">
            <!-- Start .panel -->
            <div class="panel-body p30">
                <div class="row">
                    <!-- Start .row -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-logo"><img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"></div>
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-from">
                            <ul class="list-unstyled text-right">
                                <li>{{$user->restaurant_profile->title}}</li>
                                <li>{{$user->restaurant_profile->location}}</li>
                                <li>{{$user->restaurant_profile->city->name}}</li>
                                <li>{{$user->restaurant_profile->website}}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="invoice-details mt25">
                            <div class="well">
                                <ul class="list-unstyled mb0">
                                    
                                    <li><strong>Order</strong> #936988</li>
                                    <li><strong>Date:</strong> {{ today()}}</li>
                                    
                                    <li><strong>Status:</strong> <span class="label label-danger">PAID IN
                                    @php
                                    if ($payment_id == 1){
                                        print_r('CASH');
                                    }
                                    elseif ($payment_id == 2){
                                        print_r('MPESA');
                                    }
                                    else print_r('NOTHING');


                                    @endphp
                                </ul>
                            </div>
                        </div>
                        
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                <tr>
                                    <th>Order Name</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="sm xs">Customer</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                use App\Order;
                                $user=auth()->user();
                                $restaurant=$user->restaurant_profile;
                                $orders=$user->restaurant_profile->orders;
                                $get_user = Order::where(['id' => $orderid]);

                                
                                @endphp
                                @if(null !==($restaurant))
                                @foreach($restaurant->orders as $order)
                                @if(($order->payment_option == 1 or $order->payment_option == 2) and $order->id == $order_id)

                                    <tr>
                                        <td>
                                            {{$order->menu->title}}
                                        </td>
                                        <td>{{$order->menu->category->title}}</td>
                                        <td><span class="text-muted">{{$order->user->name}}</span></td>
                                        <td>{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                        
                                        
                                        
                                       
                                       
                                        

                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <h1>No Orders made</h1>
                                    @endif
                            </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-right">Sub Total:</th>
                                            <th class="text-center">
                                            @php
                                            $total = array();
                                            foreach($restaurant->orders as $order){
                                            if(($order->payment_option == 1 or $order->payment_option == 2) and $order->id == $order_id){

                                                $total[] = $order->menu->pricing;
                                                $name = $order->user->name;
                                            }

                                            }

                                            

                                            
                                            print_r (array_sum($total)) ;
                                        
                                            
                                            @endphp</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">0% VAT:</th>
                                            <th class="text-center">{{0.00}}</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">Credit:</th>
                                            <th class="text-center">0.00</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">Total:</th>
                                            <th class="text-center">@php
                                            $total = array();
                                            foreach($restaurant->orders as $order){
                                            if(($order->payment_option == 1 or $order->payment_option == 2) and $order->id == $order_id){

                                                $total[] = $order->menu->pricing;
                                            }

                                            }

                                            

                                            
                                            print_r (array_sum($total)) ;
                                        
                                            
                                            @endphp</th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer mt25">
                            <div class="row">
			<div class="col-xs-6 margintop">
				<p class="lead marginbottom">THANK YOU!</p>

				<button class="btn btn-success" id="invoice-print"><i class="zmdi zmdi-print"></i> Print Receipt</button>
				<button class="btn btn-danger"><i class="zmdi zmdi-email"></i> Mail Receipt</button>
			</div>
            </div>
                        </div>
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
</div>
</div>


</section>


@endsection
@section('vendor-script')

@endsection
@section('page-script')
@endsection