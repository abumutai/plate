@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Conversions</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('conversions')}}">Conversions</a></li>
            <li class="breadcrumb-item active"> Edit Conversion</li>
          </ol>
        </div>
      </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="{{route('conversions.update',$conversion->id)}}" method="post">
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Edit Conversion</h3>
                </div>
                <div class="card-body">
                  @csrf
                  @method('patch')
                  <div class="form-group">
                    <label for="exampleSelectBorder"> Product Name</label> <br>
                    <select class="form-control @error('product') is-invalid @enderror " name="product" type="text" placeholder="e.g rice, meat" autocomplete="off" value="{{old('product')}}">
                      @foreach ($products as $product)
                        <option {{$conversion->product==$product->name? 'selected':''}}>{{$product->name}}</option>
                      @endforeach
                    </select>
                  </div>
                @error('product')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br> 
                  <div class="form-group">
                    <label for="exampleSelectBorder"> Product Metric</label> <br>
                    <select class="form-control @error('metric') is-invalid @enderror " name="metric" type="text" placeholder="e.g Kilograms, Grams" autocomplete="off" value="{{old('metric')}}">
                      @foreach ($metrics as $metric)
                        <option {{$conversion->metric==$metric->name? 'selected':''}}>{{$metric->name}}</option>
                      @endforeach
                    </select>
                  </div>
                @error('metric')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br> 
                  <div class="form-group">
                    <label for="exampleSelectBorder"> Menu Item Name</label> <br>
                    <select class="form-control @error('item') is-invalid @enderror " name="item" type="text" placeholder="e.g chapati, beef" autocomplete="off" value="{{old('item')}}">
                      @foreach ($items as $item)
                        <option {{$conversion->item==$item->name? 'selected':''}}>{{$item->title}}</option>
                      @endforeach
                    </select>
                </div>
                @error('item')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br> 
                <div class="form-group">
                  <label for="exampleSelectBorder"> Number of menu item Expected</label> <br>
                  <input value="{{$conversion->quantity}}" class="form-control @error('quantity') is-invalid @enderror " name="quantity" type="number" placeholder="e.g 1,10,20..." autocomplete="off" value="{{old('quantity')}}">
              </div>
              @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <br> 
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fa fa-edit"></i> Edit Conversion</button>
                  </div>
                </div>
              </form>
              </div>
       </div>
  </section>
@endsection