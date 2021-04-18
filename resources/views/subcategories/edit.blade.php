@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Subcategories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('subcategories')}}">Subcategories</a></li>
            <li class="breadcrumb-item active"> Edit Category</li>
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
          <form action="{{route('subcategories.update',$subcategory->id)}}" method="post">
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Edit Category</h3>
                </div>
                <div class="card-body">
                  @csrf
                  @method('patch')
                    <div class="form-group">
                        <label for="exampleSelectBorder"> Category Name</label> <br>
                        <input value="{{$subcategory->name}}" class="form-control @error('name') is-invalid @enderror " name="name" type="text" placeholder="e.g Cereals ">
                    </div>
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br> 
                    <div class="form-group">
                      <label for="exampleSelectBorder"> Threshold</label> <br>
                      <input value="{{$subcategory->threshold}}" class="form-control @error('name') is-invalid @enderror " name="threshold" type="text" placeholder="e.g Cereals ">
                  </div>
                  @error('threshold')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <br> 
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-edit"></i> Edit Category</button>
                  </div>
                </div>
              </form>
                <!-- /.card-body -->
              </div>
       </div>
  </section>
@endsection