@extends('portal.layouts.contentLayoutMaster2')

@section('title', 'Dashboard')

@section('vendor-style')
{{-- vendor files --}}

@endsection
@section('page-style')

@endsection

@section('content')
<section class="content home">
    {{-- Include Page Content --}}
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                    <small>Make orders on behalf of customers</small>
                </h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#111">3,2,6,5,9,8,7,9,5,1,3,5,7,4,6
                    </div>
                    <small class="col-black">Visitors</small>
                </div>
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#111">1,3,5,7,4,6,3,2,6,5,9,8,7,9,5
                    </div>
                    <small class="col-black">Bounce Rate</small>
                </div>
                <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="" class="col-black"><i class="zmdi zmdi-home"></i> Sahani</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>





    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="card" style="width: 18rem;">
                     
                                <img class="card-img-top" src="{{asset($user->restaurant_profile->logo)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$user->restaurant_profile->title}}</h5>
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                    <a href="{{route('pages.restaurants.menu',$user->restaurant_profile)}}" class="btn btn-primary">Make an Order</a>
                                </div>
                                
                            </div>
                            <div class="card" style="width: 18rem;">
                               
                            </div>
                            <div class="card" style="width: 18rem;">
                               
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

@endsection
@section('page-script')
@endsection