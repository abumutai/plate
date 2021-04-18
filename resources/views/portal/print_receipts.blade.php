
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
                    <small>Payments Voucher For The customers</small>
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





    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <h5 class="card-title">{{$user->restaurant_profile->title}}</h5>
                    <div class="body table-responsive">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="btn btn-info">NOT PAID</h4>
                        </div>
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>Order Name</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="sm xs">Customer</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs md">Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $user=auth()->user();
                                $restaurant=$user->restaurant_profile;
                                $orders=$user->restaurant_profile->orders;
                                @endphp
                                @if(null !==($restaurant))
                                @foreach($restaurant->orders as $order)
                                @if($order->payment_option == 0 and $order->status == 3)

                                    <tr>
                                        <td>
                                            {{$order->menu->title}}
                                        </td>
                                        <td>{{$order->menu->category->title}}</td>
                                        <td><span class="text-muted">{{$order->user->name}}</span></td>
                                        <td>{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                        @if($order->status ==1)
                                        <td><span class="btn btn-default">Pending </span></td>
                                        @elseif($order->status == 2)
                                        <td><span class="btn btn-warning">Processing </span></td>
                                        @elseif($order->status == 3)
                                        <td><span class="btn btn-info">Completed </span></td>
                                        @elseif($order->status == 4)
                                        <td><span class="btn btn-danger">Cancelled </span></td>
                                        @endif
                                       
                                       
                                       

                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <h1>No Orders made</h1>
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card product_item_list">
                    
                    <div class="body table-responsive">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="btn btn-info">CASH</h4>
                        </div>
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>Order Name</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="sm xs">Customer</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs md">Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $user=auth()->user();
                                $restaurant=$user->restaurant_profile;
                                $orders=$user->restaurant_profile->orders;
                                @endphp
                                @if(null !==($restaurant))
                                @foreach($restaurant->orders as $order)
                                @if($order->payment_option == 1)

                                    <tr>
                                        <td>
                                            {{$order->menu->title}}
                                        </td>
                                        <td>{{$order->menu->category->title}}</td>
                                        <td><span class="text-muted">{{$order->user->name}}</span></td>
                                        <td>{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                        
                                        <td><span class="btn btn-info">Completed </span></td>
                                        
                                       
                                       
                                        

                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <h1>No Orders made</h1>
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card product_item_list">
                    
                    <div class="body table-responsive">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="btn btn-info">M-PESA</h4>
                        </div>
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>Order Name</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="sm xs">Customer</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs md">Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $user=auth()->user();
                                $restaurant=$user->restaurant_profile;
                                $orders=$user->restaurant_profile->orders;
                                @endphp
                                @if(null !==($restaurant))
                                @foreach($restaurant->orders as $order)
                                @if($order->payment_option == 2)

                                    <tr>
                                    <a href="">
                                        <td>
                                            {{$order->menu->title}}
                                        </td>
                                        <td>{{$order->menu->category->title}}</td>
                                        <td><span class="text-muted">{{$order->user->name}}</span></td>
                                        <td>{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                        
                                        <td><span class="btn btn-info">Completed </span></td>
                                        
                                       
                                       
                            
                                    </a>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <h1>No Orders made</h1>
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

                <div class="card product_item_list">
                    
                   



   

    </div>










</section>


@endsection
@section('vendor-script')

@endsection
@section('page-script')
@endsection