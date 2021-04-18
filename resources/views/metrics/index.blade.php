@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Metrics</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active">Metrics</li>
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
              <h3 class="card-title">Metrics Available</h3>
              <div class="card-tools">
                <form class="form-inline ml-3 mr-3" action="{{route('metrics')}}">
                  <div class="input-group input-group-sm">
                    <input name="value" class="form-control form-control-navbar" type="text" placeholder="Metric Name" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-tools">
                <a href="{{route('metrics.create')}}" class="btn btn-tool btn-sm">
                  <i class="fas fa-plus text-danger fa-lg">Add Metric</i>
                </a>
             
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
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
                  @foreach ($metrics as $metric)
                  <tr>   
                    <td>{{$metric->id}}</td>
                    <td>{{$metric->name}}</td>
                    <td>
                      <a href="{{route('metrics.edit',$metric->id)}}" class="text-primary">
                        <i class="fas fa-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="{{route('metrics.delete',$metric->id)}}" class="text-danger">
                          <i class="fas fa-trash"></i>
                      </a>
                    </td>
                </tr>
                @endforeach
                
              </tbody>
              </table>
              {{$metrics->links()}}
            </div>
          </div>
       </div>
  </section>
@endsection