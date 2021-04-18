@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('users')}}">Users</a></li>
            <li class="breadcrumb-item active"> Edit User</li>
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
          <form action="{{route('users.store')}}" method="post">
            <div class="card card-success">
                <div class="card-header" style="background-color: indigo">
                  <h3 class="card-title" >Edit Users</h3>
                </div>
                <div class="card-body">
                  @csrf
                  @can('roles')
                    <div class="form-group">
                        <label for="exampleSelectBorder"> User Name</label> <br>
                        <input value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror " name="name" type="text" placeholder="" autocomplete="off">
                    </div>
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br> 
                    <div class="form-group">
                      <label for="exampleSelectBorder"> Email</label> <br>
                      <input value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror " name="email" type="email" placeholder="">
                  </div>
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <br> 
                  <div class="form-group">
                      <label for="exampleSelectBorder"> Title</label> <br>
                      <input value="{{$user->title}}" class="form-control @error('title') is-invalid @enderror " name="title" type="text" placeholder="">
                  </div>
                  @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleSelectBorder"> Section</label> <br>
                    <input value="{{$user->section}}" class="form-control @error('section') is-invalid @enderror " name="section" type="text" placeholder="">
                </div>
                @error('section')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  <br>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Role </label>
                    <select  class="custom-select form-control-border @error('role') is-invalid @enderror" name="role" id="exampleSelectBorder">
                      <option {{$user->role=='user' ? 'selected':''}} value="user">User</option>
                      <option {{$user->role=='admin' ? 'selected':''}} value="admin">Admin</option>
                    </select>
                    @error('role')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    @endcan
                    @if(Auth::user()->id==$user->id)
                    <div class="form-group">
                      <label for="exampleSelectBorder"> Password</label> <br>
                      <input class="form-control @error('password') is-invalid @enderror " name="password" type="password" placeholder="">
                  </div>
                  @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    <br>
                    <div class="form-group">
                      <label for="exampleSelectBorder"> Confirm Password</label> <br>
                      <input class="form-control @error('password_confirmation') is-invalid @enderror " name="password_confirmation" type="password" placeholder="">
                  </div>
                  @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    <br>
                  </div>
                  @endif
                  <br>
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg" style="background-color: indigo"> <i class="fas fa-edit"></i> Update User</button>
                      @if ($user->id!=Auth::user()->id)
                      <a href="{{route('users.delete',$user->id)}}" class="btn btn-danger btn-lg" style="background-color: red"> <i class="fas fa-trash"></i> Delete User</a>  
                      @endif
                    </div>
                </div>
              </form>
                <!-- /.card-body -->
              </div>
       </div>
  </section>
@endsection