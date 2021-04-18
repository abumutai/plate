@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"> <a href="{{route('suppliers')}}">Suppliers</a></li>
            <li class="breadcrumb-item active"> Add New Supplier</li>
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
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Add New Supplier</h3>
                </div>
                <div class="card-body">
                <form action="{{route('suppliers.store')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="Name">Supplier Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleSelectBorder">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Supplier Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="exampleSelectBorder">
                    @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="phone">Supplier Phone Number</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="exampleSelectBorder">
                    @error('phone')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Category of Products Supplied</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category" id="exampleSelectBorder">
                      @foreach ($categories as $category)
                        <option>{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('category')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-plus"></i> Add Supplier</button>
                  </div>
                </div>
                </form>
                </div>
                <!-- /.card-body -->
              </div>
       </div>
  </section>
@endsection