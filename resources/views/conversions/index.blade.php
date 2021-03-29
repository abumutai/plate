@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Conversions</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active">Conversions</li>
          </ol>
        </div>
      </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Conversions Available</h3>
              <div class="card-tools">
                <form class="form-inline ml-3 mr-3" action="{{route('conversions')}}">
                  <div class="input-group input-group-sm">
                    <input name="value" class="form-control form-control-navbar" type="text" placeholder="Product or Menu Item Name" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-tools">
                <a href="{{route('conversions.create')}}" class="btn btn-tool btn-sm">
                  <i class="fas fa-plus text-danger fa-lg">Add Conversions</i>
                </a>
              </div>
            </div>
            
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th>Metric</th>
                  <th>Menu Item</th>
                  <th>Expected Quantity</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @if (session('success'))
                  <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{session('success')}}
                  </div>
                  @endif
                  @foreach ($conversions as $conversion)
                  <tr>   
                    <td>{{$conversion->id}}</td>
                    <td>1 {{$conversion->metric}}</td>
                    <td>{{$conversion->product}}</td>
                    <td>{{$conversion->item}}</td>
                    <td>{{$conversion->quantity}} Plates/Items</td>
                    <td>
                      <a href="{{route('conversions.edit',$conversion->id)}}" class="text-primary">
                        <i class="fas fa-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="{{route('conversions.delete',$conversion->id)}}" class="text-danger">
                          <i class="fas fa-trash"></i>
                      </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
             <div style="margin-left: 40%">{{$conversions->links()}}</div>
            </div>
          </div>
       </div>
  </section>
@endsection