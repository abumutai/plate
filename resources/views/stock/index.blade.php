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
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Stock Records</h3>
              <div class="card-tools">
                <form class="form-inline ml-3 mr-3" action="{{route('stock')}}">
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
                <a href="{{route('consumedstocks.create')}}" class="btn btn-tool btn-sm">
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
                  <th>#</th>
                  <th>Item</th>
                  <th>Quantity</th>
                  <th>Added Date</th>
                  <th>Expires</th>
                  <th>Price</th>
                  <th>Added By</th>
                  <th>Supplier</th>
                  <th>Status</th>
                  @can('roles')
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Move</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                    <tr>
                        <td>{{$stock->id}}</td>
                        <td >{{$stock->subcategory}}</td>
                        <td>{{$stock->quantity}}</td>
                        <td>{{$stock->created_at->format('m-d')}}</td>
                        <td>{{$stock->expiry == null ? 'No Expiry' : Carbon\Carbon::parse($stock->expiry)->diffForHumans()}}</td>
                        <td>{{$stock->price}}</td>
                        <td>{{$username=strtok($stock->username,' ')}}</td>
                        <td>{{$supplier=strtok($stock->supplier,' ')}}</td>
                        <td 
                            class="{{$stock->status=='pending' ? 'bg-warning' : 'bg-success'}}"> {{$stock->status=='approved'?$stock->status: 'Pending'}}
                           @can('roles')
                            @if($stock->status=='pending')
                            <a href="{{route('stock.approve',$stock->id)}}" class="text-danger">
                                <i class="fas fa-check">Approve</i>
                            </a>
                            @endif
                            @endcan
                        </td>
                        @can('roles')
                        <td>
                          <a href="{{route('stock.edit',$stock->id)}}" class="text-primary">
                            <i class="fas fa-edit"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{route('stock.delete',$stock->id)}}" class="text-danger">
                              <i class="fas fa-trash"></i>
                          </a>
                        </td>
                        <td>
                          @if ($stock->moved==True)
                              <i class="fa fa-toggle-on text-primary ">Moved</i>
                          @else
                              <a href="{{route('stock.move',$stock->id)}}"><i class="fa fa-toggle-off fa-1x">Move</i></a>
                          @endif
                          
                        </td>
                        @endcan
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{$stocks->links()}}
            </div>
          </div>
       </div>
  </section>
@endsection