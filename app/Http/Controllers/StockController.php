<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Models\Stock;
use App\Models\Metric;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\AvailableStock;
use App\Models\Supplier;
use App\Notifications\StockApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $stocks= Stock::where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $stocks=Stock::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $stocks=Stock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$request->value)->orWhere('id',$request->value)->paginate(20);
        }
        $categories= Category::where('restaurant_profile_id',$restaurant->id);
        $subcategories= SubCategory::where('restaurant_profile_id',$restaurant->id);
        return view('stock.index',compact('stocks','categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $suppliers=Supplier::all()->where('restaurant_profile_id',$restaurant->id);
        $products= Product::all()->where('restaurant_profile_id',$restaurant->id);
        $metrics= Metric::all()->where('restaurant_profile_id',$restaurant->id);
        $categories= Category::all()->where('restaurant_profile_id',$restaurant->id);
        $subcategories= Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        return view('stock.create',compact('user','restaurant','suppliers','products','metrics','categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        if($request->has('checked'))
        {
            $request->validate([
                'expiry'=>'required'
            ]);
        }
        $validated=$request->validate([
            'item'=>'required|string',
            'quantity'=>'required|numeric|min:1',
            'metric'=>'required',
            'price'=>'required|numeric|min:1',
            'category'=>'required',
            'subcategory'=>'required',
            'supplier'=>'required'
        ]);
        
            $stock= new Stock;
            $stock->item=$request->item;
            $stock->restaurant_profile_id=$restaurant->id;
            $stock->quantity=$request->quantity;
            $stock->metric=$request->metric;
            $stock->price=$request->price;
            $stock->username=Auth::user()->name;
            $stock->category=$request->category;
            $stock->subcategory=$request->subcategory;
            $stock->expiry=$request->expiry;
            $stock->supplier=$request->supplier;
            $stock->save(); 
            $type='stockin';
            $admin= User::all()->where('role_id',2)->where('restaurant_profile_id',$restaurant->id);
            Notification::send($admin, new StockApproval($stock,$type,$user));        

        return redirect()->route('stock')->with('success','Stock Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $suppliers=Supplier::all()->where('restaurant_profile_id',$restaurant->id);
        $products= Product::all()->where('restaurant_profile_id',$restaurant->id);
        $metrics= Metric::all()->where('restaurant_profile_id',$restaurant->id);
        $categories= Category::all()->where('restaurant_profile_id',$restaurant->id);
        $subcategories= Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        $stock= Stock::findOrFail($id);
        return view('stock.edit',compact('suppliers','stock','products','metrics','categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $validated= $request->validate([
            'item'=>'required',
            'quantity'=>'required|integer|min:1',
            'price'=>'required|integer|min:1'
        ]);
        $stock= Stock::findOrFail($id);
        $old= $stock->quantity;
        $stock->restaurant_profile_id=$restaurant->id;
        $stock->item=$request->item;
        $stock->quantity=$request->quantity;
        $stock->metric=$request->metric;
        $stock->price=$request->price;
        $stock->username=Auth::user()->name;
        $stock->category=$request->category;
        $stock->subcategory=$request->subcategory;
        $stock->expiry=$request->expiry;
        $stock->supplier=$request->supplier;
        $stock->save();
        $available= AvailableStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$request->subcategory)->first();
        if($available==null)
        {
            $newstock= new AvailableStock;
            $newstock->subcategory=$request->subcategory;
            $newstock->restaurant_profile_id=$restaurant->id;
            $newstock->quantity=$request->quantity;
            $newstock->save();
        }
        else{
           $newstock= $available->quantity - $old;
            $available->quantity= $newstock+ $request->quantity;
            $available->save();
        }
      
        return redirect()->route('stock')->with('success','Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $stock= Stock::find($id);
        $available=AvailableStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$stock->subcategory)->first();
        $new=$available->quantity-$stock->quantity;
        $available->quantity=$new;
        $available->save();
        $stock->delete();


        return redirect()->route('stock')->with('success','Stock deleted successfully');
    }
    public function approve($id)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $stock= Stock::find($id);
        $stock->status='approved';
        $stock->save();
        $available= AvailableStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$stock->subcategory)->first();
           
        if($available==null)
        {
            $newstock= new AvailableStock;
            $newstock->restaurant_profile_id=$restaurant->id;
            $newstock->subcategory=$stock->subcategory;
            $newstock->quantity=$stock->quantity;
            $newstock->save();
        }
        else{
            $available->quantity= $available->quantity + $stock->quantity;
            $available->save();
        }

        return redirect()->route('stock')->with('success','Stock approved successfully');
    }
    public function available(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $availablestocks= AvailableStock::where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $availablestocks=AvailableStock::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $availablestocks=AvailableStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$request->value)->orWhere('id',$request->value)->paginate(20);
        }
        return view('stock.available',compact('availablestocks'));
    }
    public function moved($id)
    {
        $stock= Stock::find($id);
        $stock->moved=True;
        $stock->save();
        return redirect()->route('stock')->with('success','Stock marked as moved successfully');
    }
}