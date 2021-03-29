@extends('layouts/contentLayoutMaster')

@section('title', 'Shopping Cart')

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
        <div id="cart-parallax">
            <div class="bcg background39"
                 data-center="background-position: 50% 0px;"
                 data-bottom-top="background-position: 50% 100px;"
                 data-top-bottom="background-position: 50% -100px;"
                 data-anchor-target="#cart-parallax"
            >
                <div class="bg-transparent">
                    <div class="banner-content">
                        <div class="container" >
                            <div class="slider-content  "> <i class="icon-home-ico"></i>
                                <h1>Cart</h1>
                                <p>Shop With Us</p>
                                <ol class="breadcrumb">
                                    <li><a href="index01.html">Home</a></li>
                                    <li>Cart</li>
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
        <!-- Carts
        ============================================= -->
        <section class="carts text-center padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Table carts -->
                        <table class="table table-striped table-responsive table-cart">
                            <thead>
                            <tr>
                                <th style="width:40%">Product Image</th>
                                <th style="width:15%">Price</th>
                                <th style="width:20%">Quantity</th>
                                <th style="width:25%">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="menu_single.html"><img src="landing/img/carts/1.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><!-- input group minus & plus-->
                                    <div class="input-group plus-minus"> <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"> <span class="fa fa-minus"></span> </button>
                      </span>
                                        <input type="number" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                                        <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]"> <span class="fa fa-plus"></span> </button>
                      </span> </div>
                                    <!-- End input group minus & plus --></td>
                                <td><span class="total">25 $ </span> <a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="menu_single.html"><img src="landing/img/carts/2.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><!-- input group minus & plus-->
                                    <div class="input-group plus-minus"> <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[2]"> <span class="fa fa-minus"></span> </button>
                      </span>
                                        <input type="number" name="quant[2]" class="form-control input-number" value="1" min="1" max="10">
                                        <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[2]"> <span class="fa fa-plus"></span> </button>
                      </span> </div>
                                    <!-- End input group minus & plus --></td>
                                <td><span class="total">25 $ </span> <a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="menu_single.html"><img src="landing/img/carts/3.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><!-- input group minus & plus-->
                                    <div class="input-group plus-minus"> <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[3]"> <span class="fa fa-minus"></span> </button>
                      </span>
                                        <input type="number" name="quant[3]" class="form-control input-number" value="1" min="1" max="10">
                                        <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[3]"> <span class="fa fa-plus"></span> </button>
                      </span> </div>
                                    <!-- End input group minus & plus --></td>
                                <td><span class="total">25 $ </span> <a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="menu_single.html"><img src="landing/img/carts/4.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><!-- input group minus & plus-->
                                    <div class="input-group plus-minus"> <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[4]"> <span class="fa fa-minus"></span> </button>
                      </span>
                                        <input type="number" name="quant[4]" class="form-control input-number" value="1" min="1" max="10">
                                        <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[4]"> <span class="fa fa-plus"></span> </button>
                      </span> </div>
                                    <!-- End input group minus & plus --></td>
                                <td><span class="total">25 $ </span> <a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td><a href="menu_single.html"><img src="landing/img/carts/5.jpg" alt=""> Recipe Name</a> </td>
                                <td>25 $</td>
                                <td><!-- input group minus & plus-->
                                    <div class="input-group plus-minus"> <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[5]"> <span class="fa fa-minus"></span> </button>
                      </span>
                                        <input type="number" name="quant[5]" class="form-control input-number" value="1" min="1" max="10">
                                        <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[5]"> <span class="fa fa-plus"></span> </button>
                      </span> </div>
                                    <!-- End input group minus & plus --></td>
                                <td><span class="total">25 $ </span> <a class="pull-right" href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- End Table carts  -->
                    </div>
                    <!-- Carts content -->
                    <div class="col-md-12 carts-content">
                        <div class="row">
                            <!-- Left side -->
                            <div class="col-md-5 left-side">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Cupon Code">
                                    </div>
                                    <button type="submit" class="btn btn-black">Apply</button>
                                </form>
                                <!-- Carts total -->
                                <div class="carts-total text-left margin-tb-60">
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
                                </div>
                                <!-- Carts total -->
                            </div>
                            <!-- End Left side -->
                            <!-- Right side -->
                            <div class="col-md-5 col-md-offset-2 right-side">
                                <div class="form-group text-right checkout">
                                    <button type="submit" class="btn  btn-black">UPDATE</button>
                                    <button type="submit" class="btn  btn-black">PROCEED TO CHECKOUT</button>
                                </div>
                                <!-- Carts total -->
                                <div class="calc-shipping margin-tb-60">
                                    <h3>Calculate Shipping</h3>
                                    <div class="form-group">
                                        <!-- Selct wrap -->
                                        <div class="select_wrap">
                                            <select class="form-control">
                                                <option value="one">Select Your Country</option>
                                                <option value="one">One</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                                <option value="four">Four</option>
                                                <option value="five">Five</option>
                                            </select>
                                        </div>
                                        <!-- End select wrap -->
                                        <input type="text" class="form-control" placeholder="State">
                                        <input type="text" class="form-control" placeholder="Postal Code">
                                        <button type="submit" class="btn form-control btn-black">UPDATE TOTAL</button>
                                    </div>
                                </div>
                                <!-- Carts total -->
                            </div>
                            <!--End Right side -->
                        </div>
                    </div>
                    <!--End Carts content -->
                </div>
            </div>
        </section>
        <!-- End Carts -->
    </div>
    <!-- end of #content -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->

@endsection
@section('page-script')
    <!-- Page js files -->

@endsection


