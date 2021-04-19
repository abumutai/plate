<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use App\Order;
use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Metric;
use App\Models\Expense;
use App\Models\Product;
use App\Charts\StockChart;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Consumedstock;
use App\Models\AvailableStock;
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
        $expenses=Expense::all()->where('restaurant_profile_id',$restaurant->id);
        $todayexpenses=Expense::where('restaurant_profile_id',$restaurant->id)->whereDate('created_at', Carbon::today())->sum('amount');
        $todaypurchases=ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereDate('created_at', Carbon::today())->sum(DB::raw('price*quantity'));
        $purchases=ConsumedStock::where('restaurant_profile_id',$restaurant->id)->sum(DB::raw('price*quantity'));
    
        $sales=0;
        $todaysales=0;
        $orders=Order::all()->where('restaurant_profile_id',$restaurant->id)->where('status',3);
        $menus= Menu::all()->where('restaurant_profile_id',$restaurant->id);
        $todayorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereDate('created_at',Carbon::today())->get();
  
        foreach($orders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $sales=$sales+$menu->pricing;
                }
            }
        }

        foreach($todayorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $todaysales=$todaysales+$menu->pricing;
                }
            }
        }
        
        return view('dashboard',compact('todaysales','sales','purchases','todaysales','sales','todaypurchases','expenses','todayexpenses','metrics','user','restaurant','subcategories','availablestocks','stocks','products','stockin','stockout','users'));
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
