
@php
$not_paid = array();
$cash_paid = array();
$mpesapaid = array();
$user=auth()->user();
$restaurant=$user->restaurant_profile;
$orders=$user->restaurant_profile->orders;                               
@endphp



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
                </h2>
                    <div class="text-left">
                    <small>Payments Voucher For The customers</small>
                     <!-- This Declaration to find not paid total amount -->
                                    @php
                             
                                    foreach($restaurant->orders as $order){
                                        if($order->payment_option == 0 and $order->status == 3){
                                         $not_paid[] = $order->menu->pricing;

                                        }

                                    }
                                    $x = (array_sum($not_paid)) ;
                                   
                                    
                                    @endphp

                     <!-- This Declaration to find cash paid total amount -->
                                    @php
                             
                                    foreach($restaurant->orders as $order){
                                        if($order->payment_option == 1 and $order->status == 3){
                                         $cash_paid[] = $order->menu->pricing;

                                        }

                                    }
                                    $y = (array_sum($cash_paid)) ;
                                   
                                    
                                    @endphp
                     <!-- This Declaration to find M-pesa paid total amount -->
                                    @php
                             
                                    foreach($restaurant->orders as $order){
                                        if($order->payment_option == 2 and $order->status == 3){
                                         $mpesapaid[] = $order->menu->pricing;

                                        }

                                    }
                                    $z = (array_sum($mpesapaid)) ;
                                   
                                    
                                    @endphp
                              
                        <div class="animate">
                            <progress style="color: #F70" id="progressBar" max="{{($x + $y + $z)}}" value="{{ ($y +$z)}}">></progress>
	                        
                        </div>
                    </div>
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
                    <h3 class="card-title" style="color: #111">{{$user->restaurant_profile->title}}</h3>
                    
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
                            <tfoot>
                            <div class="d-flex justify-content-end mb-4">
                                <a class="btn btn-info" href="{{ URL::to('#') }}"> Total Amount Ksh  {{$x}} </a>
                            </div>
                            </tfoot>
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
                        <tfoot>
                            <div class="d-flex justify-content-end mb-4">
                                <a class="btn btn-info" href="{{ URL::to('#') }}"> Total Amount Ksh  {{$y}} </a>
                            </div>
                            </tfoot>
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
                        <tfoot>
                            <div class="d-flex justify-content-end mb-4">
                                <a class="btn btn-info" href="{{ URL::to('#') }}"> Total Amount Ksh  {{$z}} </a>
                            </div>
                            </tfoot>
                    </div>
                </div>
            </div>
        </div>
    </div>

                <div class="card product_item_list">
                    
                   



   

    </div>




<script>
 $(".meter > span").each(function () {
  $(this)
    .data("origWidth", $(this).width())
    .width(0)
    .animate(
      {
        width: $(this).data("origWidth")
      },
      1200
    );
});
</script>





</section>


@endsection
@section('vendor-script')

@endsection
@section('page-script')
@endsection