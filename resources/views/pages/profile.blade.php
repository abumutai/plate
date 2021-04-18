@extends('layouts/contentLayoutMaster')

@section('title', 'My Account')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
@endsection
@section('content')
    <!-- banner
      ============================================= -->
    <section class="banner dark" >
        <div id="myccount-parallax">
            <div class="bcg background39"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#myccount-parallax"
            >
                <div class="bg-transparent">
                    <div class="banner-content">
                        <div class="container" >
                            <div class="slider-content  "> <i class="icon-home-ico"></i>
                                <h1>My Account</h1>
                                <p>Every Thing You Know About Sahani</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>My Account</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- End Banner content -->
                </div>
                <!-- End bg trnsparent -->
            </div>
        </div>
        <!-- Service parallax -->
    </section>
    <!-- End Banner -->

    <!-- Content
      ============================================= -->
    <div id="content">
        <!-- My Account
        ============================================= -->
        <section class="myaccount text-left padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Account -->
                            <div class="account col-md-6">
                                <h3>My account</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name*">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name*">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email*">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Account -->
                            <!-- Password -->
                            <div class="password col-md-6">
                                <h3>Password Change</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="InputPassword" placeholder="Current Password (leave blank to leave unchanged)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="newInputPassword" placeholder="New Password (leave blank to leave unchanged)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="confirmInputPassword" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <button class="btn btn-black">Save Changes</button>
                                </form>
                            </div>
                            <!-- End Password -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End myaccount -->
    </div>
    <!-- end of #content -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


