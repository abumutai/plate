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
                <h2>Product List
                    <small>Welcome to Sahani</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <!-- <button data-toggle="modal" data-target="#menuAddModal" class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button> -->
                <!-- <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                        <li class="breadcrumb-item"><a href="ec-dashboard.html">eCommerce</a></li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ul> -->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                   
                                    <th>Order Name</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="sm xs">Customer</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs md">Status</th>
                                    <th data-breakpoints="sm xs md">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @if(null !==($restaurant))
                                @foreach($restaurant->orders as $order)

                                @if($order->status == 3 or $order->status == 4 )


                                <tr>


                
                                    <td>
                                        <h5>{{$order->menu->title}}</h5>
                                    </td>
                                    <td>{{$order->menu->category->title}}</td>
                                    <td>{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                    @if($order->status == 3)
                                    <td><span class="btn btn-success">Completed </span></td>
                                    @elseif($order->status == 4)

                                    <td><span class="btn btn-danger">Cancelled </span></td>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-dark dropdown-toggle" type="button" aria-expanded="false">Actions <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">

                                                <li><a href="{{ action('OrderController@pending', $order->id) }}">Pending</a>
                                                </li>

                                                <li><a href="{{ action('OrderController@processing', $order->id) }}">Processing</a>
                                                </li>
                                                <li><a href="{{ action('OrderController@completed', $order->id) }}">Completed</a>
                                                </li>
                                                <li><a href="{{ action('OrderController@cancelled', $order->id) }}">Cancelled</a>
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
</section>


<div class="modal fade" id="menuAddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="menuAddModalLabel">Order status</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('order.update')}}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('POST')
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="menu_category">Select Status</label>
                            <select class="form-control show-tick ms select2" data-placeholder="Select" id="status" name="status" required>
                                <option value="">--Select the order status--</option>
                                @foreach(\App\Status::all() as $status)
                                <option value="{{$status->id}}">{{$status->status}}</option>
                                @endforeach

                            </select>
                            @error('status')
                            <span class="text-danger pl-1 small" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div>
                            @if (!empty($order->id))

                            <input type="hidden" name="order_id" value={{$order->id}}>
                            <input type="hidden" name="user_id" value={{$order->user_id}}>

                            @endif

                        </div>
                    </div>
                    <div class="col-12">
                        <button type="reset" class="btn btn-danger ">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary ">Update
                        </button>
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
<script>
    $('#getOrderID').submit(function() {

        return false;
    });
</script>

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