@extends('layouts/contentLayoutMaster')

@section('title', 'Checkout')

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
                                <h1>Check out</h1>
                                <p>Every Thing You Know About Sahani</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>Check out</li>
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
                    <div class="col-md-12 carts-content">
                        <div class="row">
                            <!-- Cart Total -->
                            <div class="col-md-4 carts-total text-left">
                                <h3>Carts Total</h3>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Cart Subtotal</td>
                                        <td>150 $</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping and Handling</td>
                                        <td>20 $</td>
                                    </tr>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>170 $</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="calc-shipping margin-tb-60">
                                    <h3>Select Payment Method</h3>
                                    <div class="form-group">
                                        <!-- Selct wrap -->
                                        <div class="select_wrap dark_slect">
                                            <select class="form-control">
                                                <option value="">Credit Card</option>
                                                <option value="one">Visa</option>
                                                <option value="two">Master Card</option>
                                                <option value="three">Bank Account</option>
                                            </select>
                                        </div>
                                        <!-- End select wrap -->
                                    </div>
                                </div>
                                <!-- Carts total -->
                            </div>
                            <!-- End # Cart Total -->
                            <!-- Shipping Address -->
                            <div class="col-md-4">
                                <div class="calc-shipping">
                                    <h3>Shipping Address</h3>
                                    <div class="form-group">
                                        <!-- Selct wrap -->
                                        <div class="select_wrap dark_slect">
                                            <select class="form-control">
                                                <option value="">Select Delivery Method</option>
                                                <option value="one">One</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                                <option value="four">Four</option>
                                                <option value="five">Five</option>
                                            </select>
                                        </div>
                                        <!-- End select wrap -->
                                        <input type="text" class="form-control" placeholder="First Name*">
                                        <input type="text" class="form-control" placeholder="Last Name*">
                                        <input type="text" class="form-control" placeholder="Address*">
                                        <input type="text" class="form-control" placeholder="City*">
                                        <input type="text" class="form-control" placeholder="Postal Code">
                                        <input type="text" class="form-control" placeholder="Phone Number*">
                                        <input type="text" class="form-control" placeholder="Email">
                                        <textarea class="form-control" placeholder="Order Notes"></textarea>
                                    </div>
                                </div>
                                <!-- Shipping Address -->
                            </div>
                            <!-- Billing Details -->
                            <div class="col-md-4">
                                <div class="calc-shipping">
                                    <h3>Billing Details</h3>
                                    <div class="form-group">
                                        <!-- Selct wrap -->
                                        <div class="select_wrap dark_slect">
                                            <select class="form-control">
                                                <option value="">Select Country</option>
                                                <option value="one">One</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                                <option value="four">Four</option>
                                                <option value="five">Five</option>
                                            </select>
                                        </div>
                                        <!-- End select wrap -->
                                        <input type="text" class="form-control" placeholder="First Name*">
                                        <input type="text" class="form-control" placeholder="Last Name*">
                                        <input type="text" class="form-control" placeholder="Company Name*">
                                        <input type="text" class="form-control" placeholder="Address*">
                                        <input type="text" class="form-control" placeholder="City">
                                        <input type="text" class="form-control" placeholder="Postal Code">
                                        <input type="text" class="form-control" placeholder="Email">
                                        <input type="text" class="form-control" placeholder="Phone">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                                Create an account </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                                Ship the same address </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn form-control btn-black">Order Now</button>
                                </div>
                                <!-- Billing Details -->
                            </div>
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


