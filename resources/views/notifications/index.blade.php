@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Notifications</h3>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <div class="btn-group">
            <a href="{{route('notifications.markallread')}}" type="button" class="btn btn-default btn-lg" title="Mark All Read">
              <i class="fas fa-envelope-open"></i>
            </a>
            <a href="{{route('notifications.markallunread')}}" type="button" class="btn btn-default btn-lg" title="Mark All  Unread">
              <i class="far fa-envelope"></i>
            </a>
            <a href="{{route('notifications.deleteall')}}" type="button" class="btn btn-default btn-lg" title="Delete All">
              <i class="fas fa-trash-alt"></i>
            </a>
          </div>
          <!-- /.float-right -->
        </div>
        <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>
                @foreach (Auth::user()->unreadNotifications as $item)
               
                <tr style="background-color: rgb(205, 212, 219)">
                    <td>
                      <div class="btn-group">
                        <a href="{{route('notifications.markread',$item->id)}}" class="btn btn-default btn-sm" title="Mark Read">
                          <i class="fas fa-envelope-open"></i>
                        </a>
                        <a href="{{route('notifications.delete',$item->id)}}" class="btn btn-default btn-sm" title="Delete">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </div>
                  </td>
                    <td class="mailbox-name"><a href="{{route('stock')}}"> Stock {{$item->data['id']}}</a></td>
                    <td class="mailbox-subject"><b> <a href="{{route('notifications.show',$item->id)}}">Approval for {{$item->data['type']=='stockin' ? 'new' : ($item->data['type']=='moved' ? 'moved': 'destroyed')}} stock needed</b></a></td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{$item->created_at->diffForHumans()}}</td>
                  </tr>
                @endforeach
                @foreach (Auth::user()->readNotifications as $notification)
                <tr style="background-color: snow">
                  <td>
                    <div class="btn-group">
                      <a href="{{route('notifications.markunread',$notification->id)}}" class="btn btn-default btn-sm" title="Mark Unread">
                        <i class="far fa-envelope"></i>
                      </a>
                      <a href="{{route('notifications.delete',$notification->id)}}" class="btn btn-default btn-sm" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </div>
                </td>
                    <td class="mailbox-name"><a href="{{route('stock')}}"> Stock {{$notification->data['id']}}</a></td>
                    <td class="mailbox-subject"><a href="{{route('notifications.show',$notification->id)}}">Approval for {{$notification->data['type']=='stockin' ? 'new' : ($notification->data['type']=='moved' ? 'moved': 'destroyed')}} stock needed</a></td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{$notification->created_at->diffForHumans()}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <!-- /.table -->
        </div>
        <!-- /.mail-box-messages -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer p-0">
      
      </div>
    </div>
    <!-- /.card -->
  </div>
@endsection