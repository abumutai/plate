<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Stock;
use App\Models\Metric;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\AvailableStock;
use App\Models\DestroyedStock;
use App\Http\Controllers\Controller;
use App\Notifications\StockApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class DestroyedstockController extends Controller
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
        $destroyedstocks= DestroyedStock::where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $destroyedstocks=DestroyedStock::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $destroyedstocks=DestroyedStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$request->value)->orWhere('id',$request->value)->paginate(20);
        }
        $categories= Category::where('restaurant_profile_id',$restaurant->id);
        $subcategories= SubCategory::where('restaurant_profile_id',$restaurant->id);
        return view('destroyedstocks.index',compact('destroyedstocks','categories','subcategories'));
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
        $products= Product::all()->where('restaurant_profile_id',$restaurant->id);
        $metrics= Metric::all()->where('restaurant_profile_id',$restaurant->id);
        $categories= Category::all()->where('restaurant_profile_id',$restaurant->id);
        $subcategories= Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        return view('destroyedstocks.create',compact('products','metrics','categories','subcategories'));
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
        $availablestock= AvailableStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$request->subcategory)->first();
        if($availablestock->quantity < $request->quantity)
        {
            return redirect()->route('destroyedstocks.create')->with('error','The selected stock is too low');
        }
        $validated=$request->validate([
            'item'=>'required|string',
            'quantity'=>'required|numeric|min:1',
            'metric'=>'required',
            'price'=>'required|numeric|min:1',
            'category'=>'required',
            'subcategory'=>'required',
            'purpose'=>'required'
        ]);
        
            $stock= new DestroyedStock;
            $stock->item=$request->item;
            $stock->restaurant_profile_id=$restaurant->id;
            $stock->quantity=$request->quantity;
            $stock->metric=$request->metric;
            $stock->price=$request->price;
            $stock->username=Auth::user()->name;
            $stock->category=$request->category;
            $stock->subcategory=$request->subcategory;
            $stock->purpose=$request->purpose;
            $stock->save();
            $type='destroyed';
            $admin= User::all()->where('restaurant_profile_id',$restaurant->id)->where($user->role->id,2);
            Notification::send($admin, new StockApproval($stock,$type,$user));  
            
        return redirect()->route('destroyedstocks')->with('success','Stock Destroyed successfully');
    }
    public function approve($id)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $stock= DestroyedStock::find($id);
        $stock->status='approved';
        $stock->save();

        $available= AvailableStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$stock->subcategory)->first();
        $available->quantity= $available->quantity - $stock->quantity;
        $available->save();
    

        return redirect()->route('destroyedstocks')->with('success','Stock approved to be destroyed successfully');
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
        $products= Product::all()->where('restaurant_profile_id',$restaurant->id);
        $metrics= Metric::all()->where('restaurant_profile_id',$restaurant->id);
        $categories= Category::all()->where('restaurant_profile_id',$restaurant->id);
        $subcategories= Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        $destroyedstock= DestroyedStock::findOrFail($id);
        return view('destroyedstocks.edit',compact('destroyedstock','products','metrics','categories','subcategories'));
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
        $consumedstock= DestroyedStock::findOrFail($id);
        $old= $consumedstock->quantity;
        $consumedstock->restaurant_profile_id=$restaurant->id;
        $consumedstock->item=$request->item;
        $consumedstock->quantity=$request->quantity;
        $consumedstock->metric=$request->metric;
        $consumedstock->price=$request->price;
        $consumedstock->username=Auth::user()->name;
        $consumedstock->category=$request->category;
        $consumedstock->subcategory=$request->subcategory;
        $consumedstock->purpose=$request->purpose;
        $consumedstock->save();
        $available= AvailableStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$request->subcategory)->first();
        
           $newstock= $available->quantity + $old;
           $available->quantity= $newstock - $request->quantity;
           $available->save();

        return redirect()->route('destroyedstocks')->with('success','Destroyed stock updated successfully');
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
        $consumedstock= DestroyedStock::find($id);
        $old=$consumedstock->quantity;
        $available= AvailableStock::where('restaurant_profile_id',$restaurant->id)->where('subcategory',$consumedstock->subcategory)->first();
        $newstock= $available->quantity + $old;
        $available->quantity=$newstock;
        $available->save();
        $consumedstock->delete();

        return redirect()->route('destroyedstocks')->with('success','Destroyed stock deleted successfully');
    }
}