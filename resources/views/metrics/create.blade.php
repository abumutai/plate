@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Metrics</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('metrics')}}">Metrics</a></li>
            <li class="breadcrumb-item active"> Add New Metric</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <form action="{{route('metrics.store')}}" method="post">
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Add New Metric</h3>
                </div>
                <div class="card-body">
                  @csrf
                    <div class="form-group">
                        <label for="exampleSelectBorder"> Metric Name</label> <br>
                        <input class="form-control @error('name') is-invalid @enderror " name="name" type="text" placeholder="e.g Kilograms, Grams">
                    </div>
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br> 
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-plus"></i> Add Metric</button>
                  </div>
                </div>
              </form>
                <!-- /.card-body -->
              </div>
       </div>
  </section>
@endsection