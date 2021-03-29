@extends('portal.layouts.contentLayoutMaster2')

@section('title', 'QR Code - Menu')

@section('vendor-style')
    <!-- vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
 @endsection
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Restaurant QRCode
                        <small>QR Code for your restaurant's menu</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <!-- <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Sample Pages</a></li>
                        <li class="breadcrumb-item active">Stater Page</li>
                    </ul> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h4>Scan Code</h4>
                            <div class="visible-print text-center">
                                @php
                                    echo $code;
                                @endphp

                                <div class="py-2 font-weight-bold mt-2">
                                   Scan to view the menu
                                </div>
                            </div>
                            <div class="text-right">
                                <button onclick="saveQr()" class="btn btn-primary">
                                    Save</button>
                                <button onclick="scanQr()" class="btn btn-primary">
                                    <i class="zmdi zmdi-print"></i></button>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('vendor-script')
    <!-- vendor files -->
@endsection
@section('page-script')
    <!-- Page js files -->
    <script>
        function scanQr() {

        }
        function saveQr() {
            window.open({{$code}});
        }
    </script>
@endsection



