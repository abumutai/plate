@extends('portal.layouts.contentLayoutMaster2')

@section('title', 'Ingredient List')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.css') }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('css/plugins/extensions/toastr.css') }}">

    <link rel="stylesheet" href="{{asset('port/assets/css/ecommerce.css')}}">
    <link rel="stylesheet" href="{{asset('port/assets/plugins/morrisjs/morris.css')}}"/>
    <link rel="stylesheet" href="{{asset('port/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}"/>
    <link rel="stylesheet" href="{{asset('port/assets/plugins/multi-select/css/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('port/assets/plugins/jquery-spinner/css/bootstrap-spinner.css')}}">
    <link rel="stylesheet" href="{{asset('port/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('port/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('port/assets/plugins/nouislider/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('port/assets/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('port/assets/plugins/sweetalert/sweetalert.css')}}"/>
    <style>
        .ms-container .ms-selectable, .ms-container .ms-selection {
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
                        <!-- <small>Welcome to Oreo</small> -->
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button data-toggle="modal" data-target="#menuAddModal"
                            class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <!-- <li class="breadcrumb-item"><a href="index-2.html"><i class="zmdi zmdi-home"></i> Oreo</a></li> -->
                        <li class=""><span><b>Click plus icon to add</b></span> </li>
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
                                    <th>Item Title</th>
                                    <th data-breakpoints="sm xs">Description</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="sm xs md">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ingredients as $ing)
                                    <tr>
                                        <td><h5>{{$ing->title}}</h5></td>
                                        <td><span class="text-muted">{{$ing->description}}</span></td>
                                        <td>{{$ing->currency}} {{$ing->pricing}}</td>
                                        <td>
                                            <a href="javascript:void(0);"
                                               class="btn btn-default waves-effect waves-float waves-green"><i
                                                    class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);"
                                               class="btn btn-default waves-effect waves-float waves-red"><i
                                                    class="zmdi zmdi-delete"></i></a>
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <ul class="pagination pagination-primary m-b-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i
                                            class="zmdi zmdi-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i
                                            class="zmdi zmdi-arrow-right"></i></a></li>
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
                    <h4 class="title" id="menuAddModalLabel">Add an Ingredient</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('ingredient.add',$restaurant)}}"
                          enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PATCH')

                        <div class="row match-height justify-content-center">
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" class="format form-control text-capitalize"
                                                   placeholder="EX: Extra peppers"
                                                   name="title" required id="title" value="{{old('title')}}">
                                            @error('title')
                                            <span class="text-danger pl-1 small" role="alert">
                                            {{$message}}
                                         </span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Description</label>
                                            <input type="text" class="format form-control"
                                                   placeholder="brief description"
                                                   name="description" required id="description"
                                                   value="{{old('description')}}">
                                            @error('description')
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
                                            <select class="form-control show-tick ms select2" data-placeholder="Select"
                                                    id="currency"
                                                    name="currency" required>
                                                <option value="ksh" @if(old('currency')=="ksh") selected @endif>Ksh
                                                </option>
                                                <option value="$" @if(old('currency')=="$") selected @endif>&#36;
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
                                                <input type="number" name="pricing" class="form-control money-dollar"
                                                       placeholder="Ex: 9,999 ">
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
                        </div>
                        <div class="col-12">
                            <button type="reset" class="btn btn-danger ">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="btn btn-primary ">Complete
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
    <script
        src="{{asset('port/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script> <!-- Bootstrap Colorpicker Js -->
    <script
        src="{{asset('port/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script> <!-- Input Mask Plugin Js -->
    <script
        src="{{asset('port/assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
    <script
        src="{{asset('port/assets/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script> <!-- Jquery Spinner Plugin Js -->
    <script
        src="{{asset('port/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{asset('port/assets/plugins/nouislider/nouislider.js')}}"></script> <!-- noUISlider Plugin Js -->
    <script src="{{asset('port/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->

    <script src="{{asset('port/assets/js/pages/forms/advanced-form-elements.js')}}"></script>
    <script
        src="{{asset('port/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script> <!-- Bootstrap Notify Plugin Js -->

    <script src="{{asset('port/assets/js/pages/ui/notifications.js')}}"></script> <!-- Custom Js -->
    <script src="{{asset('port/assets/plugins/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js -->

    <script>
        let inputImage = document.querySelector('input[name=image]');

        inputImage.onchange = function () {
            let file = inputImage.files[0];
            displayImage(file);
        };

        function displayImage(file) {
            document.getElementById("imageDisplay").src = URL.createObjectURL(file);
        }

        $("#menuImage").click(function () {
            $("#menuImageInput").trigger('click');
        });

    </script>
    <script>
        function windowLoaded() {
            toastr.info('We do have the Kapua suite available.', 'Turtle Bay Resort');
            @if(session('error'))
            Swal.fire({
                title: "Error Detected",
                text: '{{session('error')}}',
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



