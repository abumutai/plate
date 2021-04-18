<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
//use Illuminate\Notifications\Notification;
class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('notifications.index');
    }
    public function markallread()// Marks all notifications as read
    {
        $user= Auth::user();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        
        return redirect()->route('notifications');
    }
    public function markread($id) // Marks one notification as read
    {
        $user= Auth::user();
        $notification= $user->notifications->where('id',$id);
        $notification->markAsRead();
       // $notification->save();

        return redirect()->route('notifications');
    }
    public function markallunread() // Marks all notifications as unread
    {
        $user= Auth::user();
        $user->readNotifications->markAsunRead();

        return redirect()->route('notifications');
    }
    public function markunread($id) // Marks one notification as unread
    {
        $user= Auth::user();
        $notification= $user->notifications->where('id',$id);
        $notification->markAsunRead();

        return redirect()->route('notifications');
    }
    public function deleteall() // Deletes all notifications
    {
        $user=Auth::user();
        $user->notifications()->delete();

        return redirect()->route('notifications');
    }
    public function delete($id) // Deletes one notification
    {
        $user=Auth::user();
        $notification= $user->notifications->where('id',$id)->first();
        $notification->delete();
        return redirect()->route('notifications');
    }
    public function show($id)
    {
        $user=Auth::user();
        $notification= $user->notifications->where('id',$id)->first();
        $notification->markAsRead();
       // dd($notification);
        return view('notifications.show',compact('notification'));
    }
}
