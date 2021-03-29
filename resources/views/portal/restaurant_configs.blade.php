@extends('portal.layouts.contentLayoutMaster2')

@section('title', 'tables List')

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
                <div>
                    <button data-toggle="modal" data-target="#menuAddModal"
                            class="btn btn-white btn-icon btn-round hidden-sm-down float-left m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button> 
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
                                  
                                    <th>Table</th>
                                    <th>Status</th>
                                   
                                    <th data-breakpoints="sm xs md">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                             
                                @foreach($tables as $table)
                                        <tr>
                                        
                                        <td><h5>{{$table->title}}</h5></td>
                                       @if($table->status == 0)
                                        <td><span data-toggle="modal" data-target="#deleteAddModal" class="btn btn-success">Availabe </span></td>
                            
                                       @else
                                    
                                        <td><span data-toggle="modal" data-target="#deleteAddModal" class="btn btn-danger">Booked </span></td>
                                        @endif
                                        <!-- <td>
                                            <a href="javascript:void(0);"
                                               class="btn btn-default waves-effect waves-float waves-green"><i
                                                    class="zmdi zmdi-edit"></i></a>
                                         -->
                                         <td>
                                         <a data-toggle="modal" data-target="#deleteAddModal" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i></a>

                                        </td> 
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                    <h4 class="title" id="menuAddModalLabel">Add a Table</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('table.add')}}"
                          enctype="multipart/form-data" autocomplete="off">
                        @csrf
                     
                        @method('POST')
                        <div class="row match-height justify-content-center">
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Table Title</label>
                                            <input type="text" class="format form-control text-capitalize"
                                                   placeholder="EX:  1"
                                                   name="title" required id="title" value="{{old('title')}}">
                                            @error('title')
                                            <span class="text-danger pl-1 small" role="alert">
                                            {{$message}}
                                         </span>
                                            @enderror
                                        </div>


                                    </div>
                                   
                                <div class="col-12 mt-4">
                                    <button type="reset" class="btn btn-danger ">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                            class="btn btn-primary ">Add
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



