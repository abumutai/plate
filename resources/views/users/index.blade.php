@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="row">
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users</h3>
            <div class="card-tools">
              <span class="badge badge-danger"></span>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div class="card-tools">
              <a href="{{route('users.create')}}" class="btn btn-tool btn-sm">
                <i class="fas fa-plus text-danger fa-lg">Add New User</i>
              </a>
      
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body p-0">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('success')}}
            </div>
            @endif
            <ul class="users-list clearfix">
              @foreach ($users as $user)
                <a href="{{route('users.show',$user->id)}}">
                
                  <li>
                    <img src=""  class=" fas fa-user fa-6x img-circle" alt="">
                    <i class=""></i>
                    <a class="users-list-name" href="#">{{$user->name}}</a>
                    <span class="users-list-date">{{$user->title}}</span>
                  </li>
                </a>
              @endforeach
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.card-footer -->
        </div>
        <!--/.card -->
      </div>
</div>
@endsection