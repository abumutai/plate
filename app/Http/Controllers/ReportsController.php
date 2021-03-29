<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Stock;
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
}
