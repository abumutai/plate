@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Stock</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"> <a href="{{route('stock')}}">Stock</a></li>
            <li class="breadcrumb-item active"> Add New Stock</li>
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
                  <h3 class="card-title" >Add New Stock</h3>
                </div>
                <div class="card-body">
                <form action="{{route('stock.store')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Category</label>
                    <select class="custom-select form-control-border @error('category') is-invalid @enderror" name="category" id="exampleSelectBorder">
                      @foreach ($categories as $category)
                        <option>{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('category')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Item </label>
                    <select class="custom-select form-control-border @error('item') is-invalid @enderror" name="item" id="exampleSelectBorder">
                      @foreach ($products as $product)
                        <option>{{$product->name}}</option>
                      @endforeach
                    </select>
                    @error('item')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Subcategory</label>
                    <select class="custom-select form-control-border @error('subcategory') is-invalid @enderror" name="subcategory" id="exampleSelectBorder">
                      @foreach ($subcategories as $subcategory)
                        <option>{{$subcategory->name}}</option>
                      @endforeach
                    </select>
                    @error('subcategory')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder"> Quantity</label> <br>
                    <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" placeholder="Default input">
                    @error('quantity')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Metric</label>
                    <select class="custom-select form-control-border @error('metric') is-invalid @enderror" name="metric" id="exampleSelectBorder">
                      @foreach ($metrics as $metric)
                        <option>{{$metric->name}}</option>
                      @endforeach
                    
                    </select>
                    @error('metric')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder"> Price Per Metric</label> <br>
                    <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" placeholder="Enter price per metric">
                    @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Supplier</label>
                    <select class="custom-select form-control-border @error('supplier') is-invalid @enderror" name="supplier" id="exampleSelectBorder">
                      @foreach ($suppliers as $supplier)
                        <option>{{$supplier->name}}</option>
                      @endforeach
                    
                    </select>
                    @error('supplier')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group  @error('price') is-invalid @enderror">
                    <label for="exampleSelectBorder"> Expiry/No Expiry</label> <br>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" name="checked">
                        </span>
                      </div>
                      <input type="date" name="expiry" class="form-control">
                    </div>
                    @error('expiry')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-plus"></i> Add Stock</button>
                  </div>
                </form>
                </div>
                <!-- /.card-body -->
              </div>
       </div>
  </section>
@endsection