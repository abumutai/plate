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
                <!-- <button data-toggle="modal" data-target="#menuAddModal"
                            class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
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
                                    <th>Item Title</th>
                                    <th data-breakpoints="sm xs">Restaurant</th>
                                    <th data-breakpoints="xs md">Category</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="xs">Order Date</th>
                                    <th data-breakpoints="xs md">Status</th>
                                    <th data-breakpoints="sm xs md">Action</th> 
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($orders as $order)
                                @if($order->status == 1 or $order->status == 2)

                                <tr>
                                    <td>
                                        
                                        <h5>{{$order->menu->title}}</h5>
                                    </td>
                                    <td><span class="text-muted">{{$order->restaurant_profile->title}}</span></td>
                                    <td>{{$order->menu->category->title}}</td>
                                    <td>{{$order->menu->currency}} {{$order->menu->pricing}}</td>
                                    <td> {{date_format(date_create($order->created_at), 'F jS, Y')}}</td>
                                   
                                    @if($order->status == 1)
                                    <td><span class="btn btn-warning">Pending </span></td>
                                    @elseif($order->status == 2)
                                    <td><span class="btn btn-primary">Processing </span></td>

                                    @endif

                                    <td>
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-dark dropdown-toggle" type="button" aria-expanded="false">Actions <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">


                                                <li><a href="{{ action('OrderController@cancelled', $order->id) }}">Cancel</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
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