@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Stock</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active">Stock</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Available Stock Records</h3>
              <div class="card-tools">
                <form class="form-inline ml-3 mr-3" action="{{route('stock.available')}}">
                  <div class="input-group input-group-sm">
                    <input name="value" class="form-control form-control-navbar" type="text" placeholder="Stock ID or Subcategory" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-tools">
                <a href="{{route('stock.create')}}" class="btn btn-tool btn-sm">
                  <i class="fas fa-plus text-primary fa-lg"> Add Stock</i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-times text-danger fa-lg"> Move Stock</i>
                </a>
              </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('success')}}
                </div>
            @endif
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Subcategory</th>
                  <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($availablestocks as $stock)
                    <tr>
                        <td>{{$stock->id}}</td>
                        <td>{{$stock->subcategory}}</td>
                        <td>{{$stock->quantity}}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{$availablestocks->links()}}
            </div>
          </div>
       </div>
  </section>
@endsection