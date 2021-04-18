@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Stock</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"> <a href="{{route('stock')}}">Stock</a></li>
            <li class="breadcrumb-item active"> Edit Stock</li>
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
                  <h3 class="card-title" >Edit Stock</h3>
                </div>
                <div class="card-body">
                <form action="{{route('stock.update',$stock->id)}}" method="post">
                  @csrf
                  @method('patch')
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Category</label>
                    <select value="{{$stock->category}}" class="custom-select form-control-border @error('category') is-invalid @enderror" name="category" id="exampleSelectBorder">
                      @foreach ($categories as $category)
                        <option {{$category->name == $stock->category ? 'selected':''}}>{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('category')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Item </label>
                    <select value="{{$stock->item}}" class="custom-select form-control-border @error('item') is-invalid @enderror" name="item" id="exampleSelectBorder">
                      @foreach ($products as $product)
                        <option {{$product->name == $stock->item ? 'selected':''}}>{{$product->name}}</option>
                      @endforeach
                      
                    </select>
                    @error('item')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Subcategory</label>
                    <select value="{{$stock->subcategory}}" class="custom-select form-control-border @error('subcategory') is-invalid @enderror" name="subcategory" id="exampleSelectBorder">
                      @foreach ($subcategories as $subcategory)
                        <option {{$subcategory->name == $stock->subcategory ? 'selected':''}}>{{$subcategory->name}}</option>
                      @endforeach
                    </select>
                    @error('subcategory')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder"> Quantity</label> <br>
                    <input value="{{$stock->quantity}}" class="form-control  @error('quantity') is-invalid @enderror" type="number" name="quantity" placeholder="Default input">
                    @error('quantity')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Metric</label>
                    <select value="{{$stock->metric}}" class="custom-select form-control-border @error('metric') is-invalid @enderror" name="metric" id="exampleSelectBorder">
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
                    <input value="{{$stock->price}}" class="form-control @error('price') is-invalid @enderror" type="number" name="price" placeholder="Enter price per metric">
                    @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Supplier</label>
                    <select class="custom-select form-control-border @error('supplier') is-invalid @enderror" name="supplier" id="exampleSelectBorder">
                      @foreach ($suppliers as $supplier)
                        <option {{$stock->supplier==$supplier->name ? 'selected':''}}>{{$supplier->name}}</option>
                      @endforeach
                    
                    </select>
                    @error('supplier')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class=" form-group">
                    <label for="exampleSelectBorder"> Expiry/No Expiry</label> <br>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox">
                        </span>
                      </div>
                      <input type="date" name="expiry" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-edit"></i> Edit Stock</button>
                  </div>
                </form>
                </div>
                <!-- /.card-body -->
              </div>
       </div>
  </section>
@endsection