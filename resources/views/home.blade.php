@extends('layouts.admin')
@section('styles')
@include('portal.panels.styles2')
@include('portal.panels.sidebar_left')
@stop
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Home</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
      
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
    <div class="container-fluid">
      @if (session('error'))
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('error')}}
      </div>
      @endif
      <!-- Small boxes (Stat box) -->
      <h5 class="mt-4 mb-2"></h5>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <a href="{{route('stock.create')}}">
            <div class="info-box bg-info p-4">
              <span class="info-box-icon m-5"><i class="fas fa-plus fa-2x"></i></span>

              <div class="info-box-content">
                 <h3>Add Stock</h3>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <a href="{{route('consumedstocks.create')}}">
              <div class="info-box bg-warning p-4 ">
              <span class="info-box-icon m-5"><i class="fas fa-minus fa-2x text-white"></i></span>

              <div class="info-box-content">
                <h3 class="text-white">Move Stock</h3>
              </div>
              <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <a href="{{route('products.create')}}">
            <div class="info-box bg-danger p-4">
              <span class="info-box-icon m-5"><i class="fab fa-product-hunt fa-2x"></i></span>

              <div class="info-box-content">
                <h3>Add Product</h3>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
  
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <a href="{{route('stock.available')}}">
            <div class="info-box bg-warning p-4">
              <span class="info-box-icon m-5"><i class="fas fa-list-alt fa-2x text-white"></i></span>
              <div class="info-box-content">
                <h3 class="text-white">View Available Stock</h3>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-4 col-sm-6 col-12">
            <a href="{{route('reports')}}">
            <div class="info-box bg-info p-4">
              <span class="info-box-icon m-5"><i class="fa fa-file fa-2x"></i></span>
              <div class="info-box-content">
                 <h3>View Reports</h3>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <a href="{{route('users.show',Auth::user()->id)}}">
              <div class="info-box bg-success p-4">
              <span class="info-box-icon m-5"><i class="fa fa-user-circle fa-2x"></i></span>
              <div class="info-box-content">
                <h3>View Profile</h3>
              </div>
              <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
      <!-- /.row -->
    </div>
  </section>
@endsection