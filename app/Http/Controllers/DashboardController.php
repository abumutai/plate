<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use App\Models\Stock;
use App\Models\Product;
use App\Charts\StockChart;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Consumedstock;
use App\Models\AvailableStock;
use App\Models\Metric;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $availablestocks=AvailableStock::all()->where('restaurant_profile_id',$restaurant->id);
        $stockin= Stock::all()->where('restaurant_profile_id',$restaurant->id)->where('status','approved');
        $stocks=Stock::orderBy('expiry','ASC')->where('restaurant_profile_id',$restaurant->id)->where('expiry','!=',null)->where('moved',False)->get();
        $stockout=Consumedstock::all()->where('restaurant_profile_id',$restaurant->id)->where('status','approved');
        $products= Product::all()->where('restaurant_profile_id',$restaurant->id)->count();
        $subcategories= Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        $users= User::all()->where('restaurant_profile_id',$restaurant->id);
        $metrics=Metric::all()->where('restaurant_profile_id',$restaurant->id);
        return view('dashboard',compact('metrics','user','restaurant','subcategories','availablestocks','stocks','products','stockin','stockout','users'));
    }
    public function home()
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        return view('home',compact('user','restaurant'));
    }
       
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
