@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Suppliers</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('suppliers')}}">Suppliers</a></li>
            <li class="breadcrumb-item active"> Edit Suppliers</li>
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
          <form action="{{route('suppliers.update',$supplier->id)}}" method="post">
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Edit Supplier</h3>
                </div>
                <div class="card-body">
                  @csrf
                  @method('patch')
                  <div class="form-group">
                    <label for="Name">Supplier Name</label>
                    <input type="text" value="{{$supplier->name}}" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleSelectBorder">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Supplier Email</label>
                    <input value="{{$supplier->email}}"class="form-control @error('email') is-invalid @enderror" name="email" id="exampleSelectBorder">
                    @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="phone">Supplier Phone Number</label>
                    <input type="number" value="{{$supplier->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="exampleSelectBorder">
                    @error('phone')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Category of Products Supplied</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category" id="exampleSelectBorder">
                      @foreach ($categories as $category)
                        <option {{$supplier->category==$category->name ? 'selected':''}}>{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('category')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <br> 
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-edit"></i> Edit Supplier</button>
                  </div>
                </div>
              </form>
                <!-- /.card-body -->
              </div>
       </div>
  </section>
@endsection