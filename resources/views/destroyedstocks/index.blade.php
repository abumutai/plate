@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Destroyed Stock</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active">Destroyed Stock</li>
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
              <h3 class="card-title">Destroyed Stock Records</h3>
              <div class="card-tools">
                <form class="form-inline ml-3 mr-3" action="{{route('destroyedstocks')}}">
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
                  <i class="fas fa-plus text-primary fa-lg">Add Stock</i>
                </a>
                <a href="{{route('destroyedstocks.create')}}" class="btn btn-tool btn-sm">
                    <i class="fas fa-times text-danger fa-lg"> Destroy Stock</i>
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
                  <th>Item</th>
                  <th>Quantity</th>
                  <th>Date Destroyed</th>
                  <th>Purpose</th>
                  <th>Price</th>
                  <th>Destroyed By</th>
                  <th>Status</th>
                  @can('roles')
                  <th>Edit</th>
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                    @foreach ($destroyedstocks as $destroyed)
                    <tr>
                        <td>{{$destroyed->id}}</td>
                        <td>{{$destroyed->subcategory}}</td>
                        <td>{{$destroyed->quantity}}</td>
                        <td>{{$destroyed->created_at->format('m-d')}}</td>
                        <td>{{$destroyed->purpose}}</td>
                        <td>{{$destroyed->price}}</td>
                        <td>{{$username=strtok($destroyed->username,' ')}}</td>
                        <td 
                        class="{{$destroyed->status=='pending' ? 'bg-warning' : 'bg-success'}}"> {{$destroyed->status}}
                       @can('roles')
                        @if($destroyed->status=='pending')
                        <a href="{{route('destroyedstocks.approve',$destroyed->id)}}" class="text-danger">
                            <i class="fas fa-check">Approve</i>
                        </a>
                        @endif
                        @endcan
                    </td>
                    @can('roles')
                    <td>
                          <a href="{{route('destroyedstocks.edit',$destroyed->id)}}" class="text-primary">
                            <i class="fas fa-edit"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{route('destroyedstocks.delete',$destroyed->id)}}" class="text-danger">
                              <i class="fas fa-trash"></i>
                          </a>
                        </td>
                        @endcan
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
       </div>
  </section>
@endsection