@extends('portal.layouts.contentLayoutMaster2')

@section('title', 'waiters List')

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
            <div class="col-lg-7 col-md-8 col-sm-12">
                <h2>Waiters List
                    <small>Welcome to Sahani</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-8 col-sm-12">
                <button data-toggle="modal" data-target="#menuAddModal" class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/><i class=" zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/restaurant/users">Waiters</a></li>
                    <li class="breadcrumb-item active">Waiter List</li>
                </ul>
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
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!-- <th data-breakpoints="xs md">Restaurant</th> -->
                                    <th data-breakpoints="sm xs">Role</th>
                                    <th data-breakpoints="xs">Created Date</th>

                                </tr>
                            </thead>
                            <tbody>


                                @if(null !==($users))
                                @foreach($users as $waiter)
                                <tr>
                                    <td><img src="{{$waiter->menu->image ?? asset('images/logo/SVG/chef2.svg')}}" width="48" alt="Item image"></td>
                                    <td>
                                        <h5>{{$waiter->name}}</h5>
                                    </td>

                                    <td>{{$waiter->email}}</td>
                                    <td>{{$waiter->role->title}}</td>
                                    <td>{{$waiter->created_at}}</td>


                                </tr>

                                @endforeach
                                @else
                                <h1>No waiters Added</h1>
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
                <h4 class="title" id="menuAddModalLabel">add a waiter </h4>
            </div>
            <div class="modal-body">


                <form method="post" action="{{route('waiter.add')}}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('POST')
                    <!-- Form Group -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Element -->
                                <div class="element">
                                    <input id="name" type="text" placeholder="NAME *" class="form-control text @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- End Element -->
                            </div>
                            <div class="col-md-8">
                                <!-- Element -->
                                <div class="element">
                                    <input id="email" type="email" placeholder="EMAIL *" class="form-control text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- End Element -->
                            </div>
                            <div class="col-md-8">
                                <!-- Element -->
                                <div class="element">
                                    <input type="text" name="phone" class="form-control text" placeholder="PHONE" required />
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- End Element -->
                            </div>

                            <!-- End Element -->

                            <div class="col-md-8">
                                <!-- Element -->
                                <div class="element">
                                    <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- End Element -->
                            </div>

                            <div class="col-md-8">
                                <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                </form>

                <div class="col-12">
                    <button type="reset" class="btn btn-danger ">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary ">Add
                    </button>
                </div>

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
    $('#getwaiterID').submit(function() {

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

@endsection