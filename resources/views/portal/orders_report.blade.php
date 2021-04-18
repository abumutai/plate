@php

$total = array();
$tweek = array();
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

@endphp  
@extends('portal.layouts.contentLayoutMaster2')

@section('title', 'Orders List')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.css') }}">
@endsection
@section('page-style')
<!-- Page css files -->
<link rel="stylesheet" href="{{ asset('css/plugins/extensions/toastr.css') }}">

<link rel="stylesheet" href="{{asset('port/assets/css/ecommerce.css')}}">
<link rel="stylesheet" href="{{asset('port/assets/plugins/morrisjs/morris.css')}}" />
<link rel="stylesheet" href="{{asset('port/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
<link rel="stylesheet" href="{{asset('port/assets/plugins/multi-select/css/multi-select.css')}}">
<link rel="stylesheet" href="{{asset('port/assets/plugins/jquery-spinner/css/bootstrap-spinner.css')}}">
<link rel="stylesheet" href="{{asset('port/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('port/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('port/assets/plugins/nouislider/nouislider.min.css')}}" />
<link rel="stylesheet" href="{{asset('port/assets/plugins/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('port/assets/plugins/sweetalert/sweetalert.css')}}" />

<style>
    .ms-container .ms-selectable,
    .ms-container .ms-selection {
        min-width: 100px !important;
    }
</style>
@endsection
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Order List
                    <small>Welcome to Sahani</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
            <?php
    $orders_count=0;
    $total_sales=0;
    $total_profit=0;
    $weeklysum = 0;
    use Carbon\Carbon;
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

    use App\Order;

    $orders_count = Order::where('restaurant_profile_id', $restaurant->id)->count();
    $t = date('Y-m-d H:i:s');
    $sales = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', $timezone)->count();
    $t_sales = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', $todayStartDate)->get();
    //dd($t, $timezone);
    $week_sale = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$weekStartDate, $timezone])->count();
    $t_week_sale = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$weekStartDate, $timezone])->get();
    $month_sale = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$monthStartDate, $timezone])->count();
    $year_sale = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereBetween('created_at', [$yearStartDate, $timezone])->count();

    $pending_orders = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',1)->count();
    $processing_orders = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',2)->count();
    $completed_orders = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',3)->count();
    $cancelled_orders = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->where('Status',4)->count();
   //dd($year_sale);
    //$completed_orders = Order::where('status', 1)->count();
    $t_amt = Order::with('menu')->where('restaurant_profile_id', $restaurant->id)->whereDate('created_at', Carbon::today());
    
   
    ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body table-responsive">
                    <div class="d-flex justify-content-end mb-4">
                        <a class="btn btn-primary" href="{{ URL::to('#') }}">Export to PDF</a>
                    </div>
                    <div class="d-flex justify-content-start mb-4">
                        <h2>Todays Orders</h2>
                    </div>
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>Item Title</th>
                                    <th data-breakpoints="sm xs">Restaurant</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs">Order Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($t_sales as $order)
                                

                                <tr>
                                    <td>
                                        
                                        <h5>{{$order->menu->title}}</h5>
                                    </td>
                                    <td><span class="text-muted">{{$order->restaurant_profile->title}}</span></td>
                                    <td>{{$order->menu->category->title}}</td>

                                    @if ($order->status == 3)
                                        <td>{{$order->menu->currency}} {{$order->menu->pricing}}<i style="margin-left: 5px; color: #0f0;" class="zmdi zmdi-check"></i></td>
                                    @elseif ($order->status == 4)
                                        <td>{{$order->menu->currency}} <del style="color: #f00;">{{$order->menu->pricing}}</del></td>
                                    @else
                                        <td class="text-muted">{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                    @endif
                                    <td> {{date_format(date_create($order->created_at), 'F jS, Y')}}</td>
                                    
                                    
                                    @endforeach
                            </tbody>
                            <tfoot class="d-flex"><span class="d-flex justify-content-end mb-4" > <a href="today"> <i class="zmdi zmdi-eye" style="margin-right: 3px;"></i> View Information</a></span></tfoot>
                        </table>
                        <tfoot>
                       
                            <div class="d-flex justify-content-end mb-4">
                                <a class="btn btn-info" href="{{ URL::to('#') }}"> Total Amount Ksh  
                                    @php
                             
                                    foreach($t_sales as $order){
                                        if($order->status == 3){
                                         $total[] = $order->menu->pricing;

                                        }

                                    }
                                    print_r (array_sum($total)) ;
                                   
                                    
                                    @endphp
                                </a>
                            </div>
                            </tfoot>
                    </div>
                </div>


                <div class="card product_item_list">
                    <div class="body table-responsive">
                   
                    <div class="d-flex justify-content-start mb-4">
                        <h2>This Weeks Orders</h2>
                    </div>
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>Item Title</th>
                                    <th data-breakpoints="sm xs">Restaurant</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs">Order Date</th>
                                     
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($t_week_sale as $order)
                                

                                    <tr>
                                        <a href="orders">
                                        <td>
                                            
                                            <h5>{{$order->menu->title}}</h5>
                                        </td>
                                        <td><span class="text-muted">{{$order->restaurant_profile->title}}</span></td>
                                        <td>{{$order->menu->category->title}}</td>
                                        @if ($order->status == 3)
                                            <td>{{$order->menu->currency}} {{$order->menu->pricing}}<i style="margin-left: 5px; color: #0f0;" class="zmdi zmdi-check"></i></td>
                                        @elseif ($order->status == 4)
                                            <td>{{$order->menu->currency}} <del style="color: #f00;">{{$order->menu->pricing}}</del></td>
                                        @else
                                            <td class="text-muted">{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                        @endif
                                        <td> {{date_format(date_create($order->created_at), 'F jS, Y')}}</td>
                                    
                                        
                                        @endforeach
                                        </a>
                                    </tr>
                            </tbody>
                            <tfoot class="d-flex"><span class="d-flex justify-content-end mb-4" > <a href="weekly"> <i class="zmdi zmdi-eye" style="margin-right: 3px;"></i> Detailed Information</a></span></tfoot>
                        </table>
                        <tfoot>
                       
                            <div class="d-flex justify-content-end mb-4">
                                <a class="btn btn-info" href="{{ URL::to('#') }}"> Total Amount Ksh  
                                    @php
                             
                                    foreach($t_week_sale as $order){
                                        if($order->status == 3){
                                         $tweek[] = $order->menu->pricing;

                                        }

                                    }
                                    print_r (array_sum($tweek)) ;
                                   
                                    
                                    @endphp
                                </a>
                            </div>
                            </tfoot>
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
</section>


<div class="modal fade" id="menuAddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="menuAddModalLabel">Add On the Menu</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('menu.add')}}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="row match-height justify-content-center">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Menu Title</label>
                                        <input type="text" class="format form-control text-capitalize" placeholder="EX: Ugali & Omena" name="title" required id="title" value="{{old('title')}}">
                                        @error('title')
                                        <span class="text-danger pl-1 small" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Restaurant</label>
                                            <input type="text" class="format form-control text-capitalize" placeholder="EX: Ugali & Omena" name="title" required id="title" value="{{old('title')}}">
                                            @error('title')
                                            <span class="text-danger pl-1 small" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="menu_category">Menu Category</label>
                                            <select class="form-control show-tick ms select2" data-placeholder="Select" id="menu_category" name="category_id" required>
                                                <option value="">--Select the menu category--</option>
                                                @foreach(\App\Category::all() as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach

                                            </select>
                                            @error('can_qualification_id')
                                            <span class="text-danger pl-1 small" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-lg-4 col-md-6 ">
                                        <div class="form-group">
                                            <label class="form-label" for="currency">Pricing Currency</label>
                                            <select class="form-control show-tick ms select2" data-placeholder="Select" id="currency" name="currency" required>
                                                <option value="ksh" @if(old('currency')=="ksh" ) selected @endif>Ksh
                                                </option>
                                                <option value="$" @if(old('currency')=="$" ) selected @endif>&#36;
                                                </option>
                                            </select>
                                            @error('currency')
                                            <span class="text-danger pl-1 small" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="pricing">Pricing Amount</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Ksh</span>
                                                <input type="number" name="pricing" class="form-control money-dollar" placeholder="Ex: 9,999 ">
                                            </div>
                                            @error('pricing')
                                            <span class="text-danger pl-1 small" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="col-3">
                                <div style="width: 128px; height: 128px;position: relative;margin: auto 0;">
                                    <a class="mr-2 my-25" href="javascript:void(0);">
                                        <input type="file" id="menuImageInput" name="image" accept="image/*" style="display:none" />
                                        <img src="{{asset('images/logo/SVG/food.svg')}}" id="imageDisplay" alt="users avatar" style="cursor:pointer;border: 1px dashed #757575!important;" class="users-avatar-shadow rounded" height="128" width="128">
                                    </a>
                                    <div class="carousel-caption p-0 m-0" style="position: absolute;bottom: 8px;">
                                        <div class="btn btn-sm text-white" id="menuImage" style="background-color: #282828;border-color: #282828!important;opacity: .6;padding-left: 12px!important;padding-right: 12px!important;">
                                            <i class="fa fa-pencil"></i> edit logo
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-12">
                                <div class="form-group ">
                                    <label class="form-label" for="job_description">
                                        Description
                                    </label>
                                    <textarea class="form-control" name="description" id="job_description" rows="2" cols="240" placeholder="Give a brief description of the menu item" required="">{{old("description")}}</textarea>
                                    @error('description')
                                    <span class="text-danger pl-1 small" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label>
                                    Available sizes
                                </label>
                                <div>
                                    <div class="form-group">
                                        <input type="range" min="0" max="{{\App\Size::all()->count()}}" step="1" value="0" name="max_size" style="width: 100%!important;">
                                        <div class="d-flex">
                                            <div>
                                                <input type="number" class="format form-control text-capitalize" placeholder="Price add +ksh" name="size_multiplier">
                                            </div>
                                            <div class="font-weight-bold pl-2" style="color: green">
                                                Price Ksh <span>3300</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="reset" class="btn btn-danger ">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary ">Proceed post
                                    </button>
                                </div>
                            </div>

                        </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection


@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset('vendors/js/extensions/toastr.min.js') }}"></script>
@endsection
@section('page-script')
<!-- Page js files -->
<script src="{{ asset('js/scripts/extensions/toastr.js') }}"></script>

<script src="{{asset('port/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->
<script src="{{asset('port/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script> <!-- Bootstrap Colorpicker Js -->
<script src="{{asset('port/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script> <!-- Input Mask Plugin Js -->
<script src="{{asset('port/assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
<script src="{{asset('port/assets/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script> <!-- Jquery Spinner Plugin Js -->
<script src="{{asset('port/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js -->
<script src="{{asset('port/assets/plugins/nouislider/nouislider.js')}}"></script> <!-- noUISlider Plugin Js -->
<script src="{{asset('port/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->

<script src="{{asset('port/assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('port/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script> <!-- Bootstrap Notify Plugin Js -->

<script src="{{asset('port/assets/js/pages/ui/notifications.js')}}"></script> <!-- Custom Js -->
<script src="{{asset('port/assets/plugins/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    let inputImage = document.querySelector('input[name=image]');

    inputImage.onchange = function() {
        let file = inputImage.files[0];
        displayImage(file);
    };

    function displayImage(file) {
        document.getElementById("imageDisplay").src = URL.createObjectURL(file);
    }

    $("#menuImage").click(function() {
        $("#menuImageInput").trigger('click');
    });
</script>
<script>
    function windowLoaded() {
        toastr.info('We do have the Kapua suite available.', 'Turtle Bay Resort');
        @if(session('error'))
        Swal.fire({
            title: "Error Detected",
            text: '{{session('
            error ')}}',
            type: "warning",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
        });
        @elseif(session('success'))
        Swal.fire({
            position: 'top-end',
            type: 'success',
            title: "{{session('success')}}",
            showConfirmButton: false,
            timer: 1500,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
        });
        @endif
    }
</script>
@endsection