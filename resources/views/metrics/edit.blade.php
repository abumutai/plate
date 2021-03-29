@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Metrics</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('metrics')}}">Metrics</a></li>
            <li class="breadcrumb-item active"> Edit Metric</li>
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
          <form action="{{route('metrics.update',$metric->id)}}" method="post">
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Edit Metric</h3>
                </div>
                <div class="card-body">
                  @csrf
                  @method('patch')
                    <div class="form-group">
                        <label for="exampleSelectBorder"> Metric Name</label> <br>
                        <input value="{{$metric->name}}" class="form-control @error('name') is-invalid @enderror " name="name" type="text" placeholder="e.g Kilograms, Grams">
                    </div>
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br> 
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-edit"></i> Edit Metric</button>
                  </div>
                </div>
              </form>
                <!-- /.card-body -->
              </div>
       </div>
  </section>
@endsection