<?php

namespace App\Http\Controllers;

use PDF;
use App\Menu;
use App\Order;
use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Expense;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Consumedstock;
use App\Models\AvailableStock;
use App\Models\DestroyedStock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function stocks(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $query=$request->value;
        $stocks=AvailableStock::all()->where('restaurant_profile_id',$restaurant->id);
        $subcategories= Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        $order=$request->order;
        $sort=$request->sort;
        return view('reports.availability',compact('stocks','subcategories','query','order','sort'));
    }
    public function get(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $query=$request->value;
        $order=$request->order;
        $sort=$request->sort;
        $stocks=null;
        if($sort=='DESC')
        {
            $stocks=AvailableStock::all()->where('restaurant_profile_id',$restaurant->id)->sortByDesc($order);
        }
        elseif($sort=='ASC'){
            $stocks=AvailableStock::all()->where('restaurant_profile_id',$restaurant->id)->sortBy($order);
        }
        $subcategories= Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        return view('reports.availability',compact('stocks','subcategories','query','order','sort'));
    }
    public function expiry(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $query=$request->value;
        $subcategory=$request->subcategory;
        $period=$request->period;
        $toperiod=$request->period;
        $subcategories=Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        $stocks=Stock::all()->where('restaurant_profile_id',$restaurant->id);
        $movedstocks= Consumedstock::all()->where('restaurant_profile_id',$restaurant->id);
        $destroyedstocks=DestroyedStock::all()->where('restaurant_profile_id',$restaurant->id);
        
        return view('reports.summary',compact('movedstocks','destroyedstocks','toperiod','period','subcategory','stocks','subcategories','query'));
    }
    public function expiryresult(Request $request)
    {
    
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $query=$request->value;
        $subcategory=$request->subcategory;
        $toperiod=$request->toperiod;
        $stocks=null;
        $movedstocks=null;
        $destroyedstocks=null;
        if($request->period==null)
        {
            $period=today()->subdays(1)->format('Y-m-d');
            $toperiod=today()->format('Y-m-d');
        }
        else{
           $period= $request->period; 
        }
      
        if($query=='all'&& $subcategory=='all'&& $period==null)
        {
            $stocks=Stock::all()->where('restaurant_profile_id',$restaurant->id);
            $movedstocks= Consumedstock::all()->where('restaurant_profile_id',$restaurant->id);
            $destroyedstocks=DestroyedStock::all()->where('restaurant_profile_id',$restaurant->id);
            //dd($stocks);
        }
        if($query=='all'&& $subcategory=='all'&& $period!=null)
        {
            $stocks=Stock::all()->where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at',[$period,$toperiod]);
            $movedstocks= Consumedstock::all()->where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at',[$period,$toperiod]);
            $destroyedstocks=DestroyedStock::all()->where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at',[$period,$toperiod]);
        
        }
        else if($query=='all'&&$subcategory!='all')
        {
            $stocks=Stock::all()->where('restaurant_profile_id',$restaurant->id)->where('subcategory',$subcategory)->whereBetween('created_at',[$period,$toperiod]);
            $destroyedstocks=DestroyedStock::all()->where('restaurant_profile_id',$restaurant->id)->where('subcategory',$subcategory)->whereBetween('created_at',[$period,$toperiod]);
            $movedstocks=Consumedstock::all()->where('restaurant_profile_id',$restaurant->id)->where('subcategory',$subcategory)->whereBetween('created_at',[$period,$toperiod]);
        }
        else if($query=='added'&& $subcategory=='all')
        {
            $stocks=Stock::all()->where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at',[$period,$toperiod]);
  
        }
        else if($query=='moved'&& $subcategory=='all')
        {
            $movedstocks=ConsumedStock::all()->where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at',[$period,$toperiod]);
        }
        else if($query=='destroyed'&& $subcategory=='all')
        {
            $destroyedstocks=DestroyedStock::all()->where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at',[$period,$toperiod]);
        }
    
        else if($query=='added'&& $subcategory!=='all')
        {
            $stocks=Stock::all()->where('restaurant_profile_id',$restaurant->id)->where('subcategory',$subcategory)->whereBetween('created_at',[$period,$toperiod]);
  
        }
        else if($query=='moved'&& $subcategory!='all')
        {
            $movedstocks=Consumedstock::all()->where('restaurant_profile_id',$restaurant->id)->where('subcategory',$subcategory)->whereBetween('created_at',[$period,$toperiod]);
        }
        else if($query=='destroyed'&& $subcategory!='all')
        {
            $destroyedstocks=DestroyedStock::all()->where('restaurant_profile_id',$restaurant->id)->where('expiry','<',now())->where('subcategory',$subcategory)->whereBetween('created_at',[$period,$toperiod]);
        }
       
        //dd($stocks);
        $subcategories=Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        return view('reports.summary',compact('destroyedstocks','movedstocks','toperiod','period','subcategory','stocks','subcategories','query'));
    }
    public function profitloss(Request $request)
    {
      
        $period=$request->period;
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        if($period==null)
        {
            $period=today();
        }
        else if($period!=null)
        {
            $period=Carbon::parse($period)->format('Y-m-d');
        }

            $todaysales=0;
            $todaypurchases=ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereDate('created_at',$period)->sum(DB::raw('price*quantity'));
            $todayexpenses=Expense::where('restaurant_profile_id',$restaurant->id)->whereDate('created_at',$period)->sum('amount');
            $todayorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereDate('created_at',$period)->get();
            
            $weeklysales=0;
            $weeklypurchases=ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at', [Carbon::parse($period)->startOfWeek(), Carbon::parse($period)->endOfWeek()])->sum(DB::raw('price*quantity'));
            $weeklyexpenses=Expense::where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at', [Carbon::parse($period)->startOfWeek(), Carbon::parse($period)->endOfWeek()])->sum('amount');
            $weeklyorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereBetween('created_at', [Carbon::parse($period)->startOfWeek(), Carbon::parse($period)->endOfWeek()])->get();
            
            $monthlysales=0;
            $monthlypurchases=ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereMonth('created_at',[Carbon::parse($period)->startOfMonth(), Carbon::parse($period)->endOfMonth()])->sum(DB::raw('price*quantity'));
            $monthlyexpenses=Expense::where('restaurant_profile_id',$restaurant->id)->whereMonth('created_at',[Carbon::parse($period)->startOfMonth(), Carbon::parse($period)->endOfMonth()])->sum('amount');
            $monthlyorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereMonth('created_at',[Carbon::parse($period)->startOfMonth(), Carbon::parse($period)->endOfMonth()])->get();

            $yearlysales=0;
            $yearlypurchases=ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereYear('created_at',[Carbon::parse($period)->startOfYear(), Carbon::parse($period)->endOfYear()])->sum(DB::raw('price*quantity'));
            $yearlyexpenses=Expense::where('restaurant_profile_id',$restaurant->id)->whereYear('created_at',[Carbon::parse($period)->startOfYear(), Carbon::parse($period)->endOfYear()])->sum('amount');
            $yearlyorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereYear('created_at',[Carbon::parse($period)->startOfYear(), Carbon::parse($period)->endOfYear()])->get();
            
            $menus= Menu::all()->where('restaurant_profile_id',$restaurant->id);
       

        foreach($todayorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $todaysales=$todaysales+$menu->pricing;
                }
            }
        }

        foreach($weeklyorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $weeklysales=$weeklysales+$menu->pricing;
                }
            }
        }

        foreach($monthlyorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $monthlysales=$monthlysales+$menu->pricing;
                }
            }
        }

        foreach($yearlyorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $yearlysales=$yearlysales+$menu->pricing;
                }
            }
        }

        return view('reports.profit_loss',compact('yearlysales','yearlypurchases','yearlyexpenses','monthlysales','monthlypurchases','monthlyexpenses','weeklysales','weeklypurchases','weeklyexpenses','todaypurchases','todaysales','period','todayexpenses'));
    }
    public function printPDF($query)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $data= [
        'stocks'=> AvailableStock::all()->where('restaurant_profile_id',$restaurant->id),
        'subcategories'=>Subcategory::all()->where('restaurant_profile_id',$restaurant->id),
        'query'=>$query
        ];
         $pdf = PDF::loadView('reports.pdf_view', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }
    public function printsummary(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $query=$request->value;
        $subcategory=$request->subcategory;
        $data= [
        'stocks'=> Stock::all()->where('restaurant_profile_id',$restaurant->id),
        'subcategories'=>Subcategory::all()->where('restaurant_profile_id',$restaurant->id),
        'movedstocks'=>Consumedstock::all()->where('restaurant_profile_id',$restaurant->id),
        'destroyedstocks'=>DestroyedStock::all()->where('restaurant_profile_id',$restaurant->id),
        'query'=>$query,
        'subcategory'=>$subcategory
        ];
        //dd($data);
         $pdf = PDF::loadView('reports.summary_pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }
    public function printprofitloss(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $period=$request->period;
        if($period==null)
        {
            $period=today();
        }
        else if($period!=null)
        {
            $period=Carbon::parse($period)->format('Y-m-d');
        }
            $todaysales=0;
            $todayorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereDate('created_at',$period)->get();

            $weeklysales=0;
            $weeklyorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereBetween('created_at', [Carbon::parse($period)->startOfWeek(), Carbon::parse($period)->endOfWeek()])->get();
            
            $monthlysales=0;
            $monthlyorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereMonth('created_at',[Carbon::parse($period)->startOfMonth(), Carbon::parse($period)->endOfMonth()])->get();

            $yearlysales=0;
            $yearlyorders=Order::where('restaurant_profile_id',$restaurant->id)->where('status',3)->whereYear('created_at',[Carbon::parse($period)->startOfYear(), Carbon::parse($period)->endOfYear()])->get();
            
            $menus= Menu::all()->where('restaurant_profile_id',$restaurant->id);
       

        foreach($todayorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $todaysales=$todaysales+$menu->pricing;
                }
            }
        }

        foreach($weeklyorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $weeklysales=$weeklysales+$menu->pricing;
                }
            }
        }

        foreach($monthlyorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $monthlysales=$monthlysales+$menu->pricing;
                }
            }
        }

        foreach($yearlyorders as $order){
            foreach($menus as $menu){
                if($order->menu_id==$menu->id){
                    $yearlysales=$yearlysales+$menu->pricing;
                }
            }
        }

        $data= [
                'period'=>$period,
                'todaysales'=>$todaysales,
                'todaypurchases'=>ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereDate('created_at',$period)->sum(DB::raw('price*quantity')),
                'todayexpenses'=>Expense::where('restaurant_profile_id',$restaurant->id)->whereDate('created_at',$period)->sum('amount'),
    
                'weeklysales'=>$weeklysales,
                'weeklypurchases'=>ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at', [Carbon::parse($period)->startOfWeek(), Carbon::parse($period)->endOfWeek()])->sum(DB::raw('price*quantity')),
                'weeklyexpenses'=>Expense::where('restaurant_profile_id',$restaurant->id)->whereBetween('created_at', [Carbon::parse($period)->startOfWeek(), Carbon::parse($period)->endOfWeek()])->sum('amount'),
                
                'monthlysales'=>$monthlysales,
                'monthlypurchases'=>ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereMonth('created_at',[Carbon::parse($period)->startOfMonth(), Carbon::parse($period)->endOfMonth()])->sum(DB::raw('price*quantity')),
                'monthlyexpenses'=>Expense::where('restaurant_profile_id',$restaurant->id)->whereMonth('created_at',[Carbon::parse($period)->startOfMonth(), Carbon::parse($period)->endOfMonth()])->sum('amount'),
                
                'yearlysales'=>$yearlysales,
                'yearlypurchases'=>ConsumedStock::where('restaurant_profile_id',$restaurant->id)->whereYear('created_at',[Carbon::parse($period)->startOfYear(), Carbon::parse($period)->endOfYear()])->sum(DB::raw('price*quantity')),
                'yearlyexpenses'=>Expense::where('restaurant_profile_id',$restaurant->id)->whereYear('created_at',[Carbon::parse($period)->startOfYear(), Carbon::parse($period)->endOfYear()])->sum('amount'),
        ];
       
         $pdf = PDF::loadView('reports.plsummary', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }
}
