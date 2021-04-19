
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





    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <h5 class="card-title">{{$user->restaurant_profile->title}}</h5>
                    <div class="body table-responsive">
                        <div class="d-flex justify-content-between mb-4">
                            <a class="btn btn-primary" href="{{ URL::to('/portal/orders/pdf') }}">Export to PDF</a>
                        </div>
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>Order Name</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="sm xs">Customer</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs md">Status</th>
                                    <th data-breakpoints="sm xs md">Payment</th>
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
                                @if($order->status == 3 && $order->payment_option == 0)

                                    <tr>
                                        <td>
                                            {{$order->menu->title}}
                                        </td>
                                        <td>{{$order->menu->category->title}}</td>
                                        <td><span class="text-muted">{{$order->user->name}}</span></td>
                                        <td>{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                        
                                        <td><span class="btn btn-info">Completed </span></td>
                                        
                                       
                                       
                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-dark dropdown-toggle" type="button" aria-expanded="false">Option <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                
                                                
                                                    <li><a href="{{ URL::to('/cashier/cash', $order->id) }}">Cash</a>
                                                    </li>

                                                    <li><a href="{{ URL::to('/cashier/mpesa', $order->id) }}">M-Pesa</a>
                                                    </li>
                                                    <li><a href="{{ URL::to('/cashier/all', $order->user_id) }}">Pay All</a>
                                                    </li>
                                                    

                                                </ul>
                                            </div>
                                        </td>

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




    <div class="card">
        <div class="body">
            <ul class="pagination pagination-primary m-b-0">
                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
            </ul>
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