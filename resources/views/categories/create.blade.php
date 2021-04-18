@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('categories')}}">Categories</a></li>
            <li class="breadcrumb-item active"> Add New Category</li>
          </ol>
        </div>
      </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="{{route('categories.store')}}" method="post">
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Add New Category</h3>
                </div>
                <div class="card-body">
                  @csrf
                    <div class="form-group">
                        <label for="exampleSelectBorder"> Category Name</label> <br>
                        <input class="form-control @error('name') is-invalid @enderror " name="name" type="text" placeholder="e.g Cereals">
                    </div>
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br> 
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-plus"></i> Add Category</button>
                  </div>
                </div>
              </form>
              </div>
       </div>
  </section>
@endsection