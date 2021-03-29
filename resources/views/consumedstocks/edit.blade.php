@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Moved Stock</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"> <a href="{{route('consumedstocks')}}">Moved Stock</a></li>
            <li class="breadcrumb-item active"> Edit Moved Stock</li>
          </ol>
        </div>
      </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Edit Moved Stock</h3>
                </div>
                <div class="card-body">
                  @if (session('error'))
                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session('success')}}
                    </div>
                  @endif
                <form action="{{route('consumedstocks.update',$consumedstock->id)}}" method="post">
                  @csrf
                  @method('patch')
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Category</label>
                    <select value="{{$consumedstock->category}}" class="custom-select form-control-border @error('category') is-invalid @enderror" name="category" id="exampleSelectBorder">
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
                    <select value="{{$consumedstock->item}}" class="custom-select form-control-border @error('item') is-invalid @enderror" name="item" id="exampleSelectBorder">
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
                    <select value="{{$consumedstock->subcategory}}" class="custom-select form-control-border @error('subcategory') is-invalid @enderror" name="subcategory" id="exampleSelectBorder">
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
                    <input value="{{$consumedstock->quantity}}" class="form-control  @error('quantity') is-invalid @enderror" type="number" name="quantity" placeholder="Default input">
                    @error('quantity')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Metric</label>
                    <select value="{{$consumedstock->metric}}" class="custom-select form-control-border @error('metric') is-invalid @enderror" name="metric" id="exampleSelectBorder">
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
                    <input value="{{$consumedstock->price}}" class="form-control @error('price') is-invalid @enderror" type="number" name="price" placeholder="Enter price per metric">
                    @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class=" form-group">
                    <label for="exampleSelectBorder">Purpose</label> <br>
                    <select value="{{$consumedstock->purpose}}" class="custom-select form-control-border @error('purpose') is-invalid @enderror" name="purpose" id="exampleSelectBorder">
                      <option>Kitchen Use</option>
                      <option>Resale</option>
                  </select>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-edit"></i> Edit Moved</button>
                  </div>
                </form>
                </div>
              </div>
       </div>
  </section>
@endsection