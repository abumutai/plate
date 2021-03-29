<?php

namespace App\Http\Controllers;

use App\RestaurantProfile;
use App\User;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $restaurant = $user->restaurant_profile;
        return view('portal.admin_dashboard', compact('user', 'restaurant'));
    }
    public function manageUsers()
    {
        $user = auth()->user();
        $users = User::all()->where('role_id', 2);;
        return view('portal.admin_manage_users', compact('user', 'users'));
    }


    public function keepOrderID(Request $request)
    {
        $data = request()->validate([
            'res_id' => [],


        ]);
    }
    public function activate($restaurant_profile_id)
    {


        try {

            RestaurantProfile::where(['id' => $restaurant_profile_id])->update(['status' => '1']);

            return redirect('/admin/manage/users')->with('success', 'User has been Activated');
        } catch (\Exception $e) {
            return redirect('/admin/dashboard')->with('error', 'An error occured while activating restaurant ');
        }
    }
    public function suspend($restaurant_profile_id)
    {


        try {

            RestaurantProfile::where(['id' => $restaurant_profile_id])->update(['status' => '2']);
            return redirect('/admin/manage/users')->with('success', 'User has been Suspended');
        } catch (\Exception $e) {
            return redirect('/admin/dashboard')->with('error', 'An error occured while activating a buy Offer');
        }
    }

    public function UpdateStatus(Request $request)
    {
        $data = request()->validate([
            'restaurant_profile_id' => [],
            'status' => []

        ]);


        $res = RestaurantProfile::find(session('res_id'));

        $res->update([
            'status' => $request->status,

        ]);
        $user = auth()->user();
        $restaurant = $user->restaurant_profile;

        $users = User::all()->where('role_id', 2);;

        return view('portal.admin_manage_users', compact('user', 'users'));
    }
}
