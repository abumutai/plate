@extends('portal.layouts.contentLayoutMaster2')

@section('title', 'Profile')

@section('vendor-style')
    <!-- vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{asset('port/assets/css/timeline.css')}}">
@endsection
@section('content')
    <section class="content profile-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile
                        <small>Welcome to Sahani</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="zmdi zmdi-home"></i> Sahani</a>
                        </li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card profile-header">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="profile-image float-md-right"><img
                                            src="{{$restaurant->logo??asset('images/logo/SVG/chef2.svg')}}" alt=""></div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <h4 class="m-t-0 m-b-0"><strong>{{$restaurant->title}}</strong></h4>
                                    <span class="job_post">{{$restaurant->headline}}</span>
                                    <p>{{$restaurant->location}}</p>
                                    <div class="">
                                        <a class="text-dark" href="tel:{{$restaurant->phone}}"><i
                                                class="zmdi zmdi-phone mr-1"></i> {{$restaurant->phone}}</a><br>
                                        <a class="text-dark" href="mailto:{{$restaurant->email}}"><i
                                                class="zmdi zmdi-email mr-1"></i> {{$restaurant->email}}</a>
                                    </div>
                                    <p class="social-icon m-t-5 m-b-0">
                                        <a title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                        <a title="Facebook" href="javascript:void(0);"><i
                                                class="zmdi zmdi-facebook"></i></a>
                                        <a title="Google-plus" href="javascript:void(0);"><i
                                                class="zmdi zmdi-twitter"></i></a>
                                        <a title="Behance" href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a>
                                        <a title="Instagram" href="javascript:void(0);"><i
                                                class="zmdi zmdi-instagram "></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">About</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane body active" id="about">
                                <small class="text-muted">Email address: </small>
                                <p>{{$restaurant->email}}</p>
                                <hr>
                                <small class="text-muted">Phone: </small>
                                <p>{{$restaurant->phone}}</p>
                                <hr>
                                <small class="text-muted">Website: </small>
                                <p>{{$restaurant->website}}</p>
                                <hr>
                                <small class="text-muted">Date Joined: </small>
                                <p class="m-b-0">  {{date_format( date_create($restaurant->created_at), 'F jS, Y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#usersettings">Setting</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane  active" id="usersettings">
                       {{--
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Security</strong> Settings</h2>
                                </div>
                                <form method="get" action="{{route('settings.update.password')}}"
                                      autocomplete="off" class="body">
                                    <div class="form-group">
                                        <input type="password"   name="current_password" required class="form-control" placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="New Password" name="password_confirmation">
                                    </div>
                                    <button class="btn btn-info btn-round">Save Changes</button>
                                </div>
                            </div>
                            --}}
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Restaurant</strong> Settings</h2>
                                </div>
                                <div class="body">
                                    <form class="row clearfix" action="{{route('profile.update')}}" method="post"
                                          enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        @method('PATCH')
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name"
                                                       name="title" value="{{$restaurant->title??old('title')}}">
                                                @error('title')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                                        <strong>{{$message}}.</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <select class="form-control show-tick ms select2"
                                                        data-placeholder="Select"
                                                        id="category_id"
                                                        name="category_id" required>
                                                    @foreach(\App\Category::all() as $category)
                                                        <option value="{{$category->id}}"
                                                                @if($restaurant->category_id??old('category_id')==$category->id) selected @endif>
                                                            {{$category->title}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                            {{$message}}
                                         </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Headline"
                                                       name="headline" value="{{$restaurant->headline??old('headline')}}">
                                                @error('headline')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                                        <strong>{{$message}}.</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="location"
                                                       name="location" value="{{$restaurant->location??old('location')}}">
                                                @error('location')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                                        <strong>{{$message}}.</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                             
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <select class="form-control show-tick ms select2"
                                                        data-placeholder="Select"
                                                        id="country" name="country_id">
                                                    <option value="">Select Country</option>
                                                    @foreach (\App\Country::all() as $country)
                                                        <option value="{{$country->id}}">
                                                            {{$country->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('country_id')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                            {{$message}}
                                         </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <select class="form-control show-tick ms select2"
                                                        data-placeholder="Select"
                                                        id="city" name="city_id" >
                                                    <option value="">City</option>
                                                </select>
                                                @error('city_id')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                            {{$message}}
                                         </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Website" value="{{$restaurant->website}}" name="website">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{$restaurant->email}}" placeholder="E-mail" name="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{$restaurant->postal_address}}" placeholder="Address" name="postal_address">
                                            </div>
                                        </div>
                                        <p> <b>Restaurant Logo</b></p>

                                        <div class=" col-md-12">
                                            <div class="form-group">
                                                <input type="file" class="form-control" placeholder="logo" name="logo">
                                            </div>
                                        </div>
                                        <p> <b>Restaurant Cover</b></p>

                                        <div class=" col-md-12">
                                            <div class="form-group">
                                                <input type="file" class="form-control" placeholder="banner" name="banner">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <h5>  Kula Points Ratio </h5>
                                            <p> <b>One Kula point equaly how much spend?</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Kula Points"
                                                       name="kula_points_ratio" value="{{$restaurant->kula_points_ratio??old('kula_points_ratio')}}">
                                                @error('kula_points_ratio')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                                        <strong>{{$message}}.</strong>
                                                </span>
                                                @enderror
                                            </div>
                                         </div>
                                         <div class="col-lg-6 col-md-12">
                                            <h5>  Delivery Fee </h5>
                                            <p class= ""> Our Delivery Fee</p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Delivery fee"
                                                       name="delivery_fee" value="{{$restaurant->delivery_fee??old('delivery_fee')}}">
                                                @error('delivery_fee')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                                        <strong>{{$message}}.</strong>
                                                </span>
                                                @enderror
                                            </div>
                                         </div>


                                         <div class="col-lg-6 col-md-12">
                                       
                                            <p> <b>Opening Hours</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="8 am - 8 pm"
                                                       name="opening_hours" value="{{$restaurant->kula_points_ratio??old('opening_hours')}}">
                                                @error('opening_hours')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                                        <strong>{{$message}}.</strong>
                                                </span>
                                                @enderror
                                            </div>
                                         </div>
                                         <!-- <div class="col-lg-6 col-md-12">
                                         
                                            <p class= ""> Our Delivery Fee</p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Delivery fee"
                                                       name="delivery_fee" value="{{$restaurant->delivery_fee??old('delivery_fee')}}">
                                                @error('delivery_fee')
                                                <span class="small pl-3 text-danger font-weight-light" role="alert">
                                                        <strong>{{$message}}.</strong>
                                                </span>
                                                @enderror
                                            </div>
                                         </div> -->

                                        <div class="row col-12 col-md-12" id="options_2">
                                            <div class="col-md-12 py-1 my-1">
                                       
                                               <h5>  <b>Services offered</b></h5>

                                            </div>
                                            @foreach(\App\Service::all() as $service)
                                                <div class="col-md-3">
                                                    <input id="checkbox{{$service->id}}" type="checkbox" name="service[]" checked value="{{$service->id}}">
                                                    <label for="checkbox{{$service->id}}">{{$service->title}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-round" type="submit">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
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
    <script src="{{asset('port/assets/js/pages/charts/jquery-knob.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                let country_id = this.value;
                $.ajax({
                    url: "/country/" + country_id + "/cities",
                    type: "GET",
                    success: function (result) {
                        $("#city").empty();
                        $("#city").append('<option selected value="">Please select city</option>');
                        $.each(result, function (key, value) {
                            $("#city").append('<option value="' + key + '">' + value + '</option>');
                        });
                        $('.selectpicker').selectpicker('refresh');
                    }
                });
            });
        });
    </script>
@endsection
