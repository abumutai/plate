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
    <div class="card card-primary card-outline col-lg-12">
        <div class="card-body box-profile">
          <div class="text-center">
            <i class="fas fa-user fa-7x bg-info img-circle"></i>
                
          
          </div>
    
          <h3 class="profile-username text-center"></h3>
    
          <p class="text-muted text-center">{{$user->name}}</p>
    
          <ul class="list-group list-group-unbordered mb-3" style="text-align: center">
            <li class="list-group-item">
              <b>Role: </b> {{$user->role_id==1 ? 'Admin': 'Kitchen'}}
            </li>
          </ul>
    
          <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-block"><b>Edit User</b></a>
        </div>
        <!-- /.card-body -->
      </div>
     
</div>
@endsection
