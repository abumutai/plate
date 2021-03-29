@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Notifications</h3>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Read Notification</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-read-info">
              <h5><b> {{$notification->data['type']=='stockin' ? 'New' : ($notification->data['type']=='moved' ? 'Moved': 'Destroyed')}} Stock {{$notification->data['id']}}</b></h5>
              <h6>{{-- From: support@adminlte.io --}}
                <span class="mailbox-read-time float-right">{{$notification->created_at}}</span></h6>
            </div>
          
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
              <p>Hello {{Auth::user()->name}},</p>
              <p>Admin approval is required to {{$notification->data['type']=='stockin' ? 'add' : ($notification->data['type']=='moved' ? 'move': 'destroy')}} Stock {{$notification->data['id']}}</p>
              <p>Click <a href="{{route($notification->data['type']=='stockin' ? 'stock' : ($notification->data['type']=='consumedstocks' ? 'move': 'destroyedstocks'))}}">here</a> to view.

              <p>Thanks</p>
            </div>
            <!-- /.mailbox-read-message -->
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer -->
          <div class="card-footer">
           
          </div>
          <!-- /.card-footer -->
        </div>
      </div>
      <div class="card-footer p-0">
      </div>
    </div>
    <!-- /.card -->
  </div>
@endsection