@extends('portal.layouts.contentLayoutMaster2')

@section('title', 'Gallery')

@section('vendor-style')
    <!-- vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->


    <link rel="stylesheet" href="{{asset('port/assets/plugins/light-gallery/css/lightgallery.css')}}">
    <link rel="stylesheet" href="{{asset('port/assets/plugins/dropzone/dropzone.css')}}">

@endsection
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Image Gallery
                        <small>Welcome to Oreo</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button data-toggle="modal" data-target="#menuAddModal"
                            class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    @include('portal.panels.breadcrumb')
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Here's a Tip</strong></h2>
                            <ul class="header-dropdown">
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>Here you can upload images to showcase your restaurant to the world. <br class="pl-1">Preferable
                                image size is <strong>1000 x 667</strong></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Gallery</strong> <small>Pictures are showcased at your <a
                                        href="{{route('pages.restaurants.profile',$restaurant)}}"
                                        style="font-weight: normal!important;text-decoration: underline!important;">profile</a></small>
                            </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                                        aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                @foreach($restaurant->galleries as $gallery)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-20"><a
                                            href="{{$gallery->image}}"> <img
                                                class="img-fluid img-thumbnail"
                                                src="{{$gallery->image}}" alt="{{$gallery->summary}}"> </a>
                                    </div>
                                @endforeach
                            </div>
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
                    <h4 class="title" id="menuAddModalLabel">Upload Image to Gallery</h4>
                </div>
                <form method="post" action="{{route('gallery.add',$restaurant)}}"
                      enctype="multipart/form-data" autocomplete="off" class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="summary">Summary</label>
                                <input type="text" class="format form-control"
                                       placeholder="Brief summary of the image"
                                       name="summary" required id="summary" value="{{old('summary')}}">
                                @error('summary')
                                <span class="text-danger pl-1 small" role="alert">
                                            {{$message}}
                                         </span>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="px-2">
                        <input type="file" id="file1" name="file[]" multiple="multiple"
                               accept="image/*" required
                        />
                    </div>
                    <div class="col-12 mt-2 text-right">
                        <button type="submit"
                                class="btn btn-primary ">Complete
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

<form
@section('vendor-script')
    <!-- vendor files -->

    <!-- Light Gallery Plugin Js -->
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{asset('port/assets/plugins/light-gallery/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('port/assets/plugins/dropzone/dropzone.js')}}"></script> <!-- Dropzone Plugin Js -->

    <script src="{{asset('port/assets/js/pages/medias/image-gallery.js')}}"></script>


@endsection



