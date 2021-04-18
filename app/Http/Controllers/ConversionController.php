<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Models\Conversion;
use App\Models\Metric;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ConversionController extends Controller
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
        $user= auth()->user();
        $restaurant=$user->restaurant_profile;

        $conversions=Conversion::all()->where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $conversions= Conversion::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $conversions=Conversion::where('restaurant_profile_id',$restaurant->id)->where('product',$request->value)->orWhere('item',$request->value)->paginate(20);
        }
        return view('conversions.index',compact('conversions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= auth()->user();
        $restaurant=$user->restaurant_profile;
        $products=Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        $items=Menu::all()->where('restaurant_profile_id',$restaurant->id);
        $metrics=Metric::all()->where('restaurant_profile_id',$restaurant->id);
        return view('conversions.create',compact('metrics','products','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= auth()->user();
        $restaurant=$user->restaurant_profile;
        $validated= $request->validate([
            'product'=>'required|string',
            'item'=>'required|string',
            'quantity'=>'required|integer'

        ]);
        $conversion = new Conversion;
        $conversion->product= $request->product;
        $conversion->restaurant_profile_id=$restaurant->id;
        $conversion->item= $request->item;
        $conversion->metric=$request->metric;
        $conversion->quantity= $request->quantity;
        $conversion->save();

        return redirect()->route('conversions')->with('success','Conversion added successfully');
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
        $user= auth()->user();
        $restaurant=$user->restaurant_profile;
        $products=Subcategory::all()->where('restaurant_profile_id',$restaurant->id);
        $items=Menu::all()->where('restaurant_profile_id',$restaurant->id);
        $conversion=Conversion::findOrFail($id);
        $metrics=Metric::all()->where('restaurant_profile_id',$restaurant->id);
        return view('conversions.edit',compact('metrics','conversion','products','items'));
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
        $user= auth()->user();
        $restaurant=$user->restaurant_profile;
        $validated= $request->validate([
            'product'=>'required|string',
            'item'=>'required|string',
            'quantity'=>'required|integer'
        ]);
        $conversion= Conversion::findOrFail($id);
        $conversion->restaurant_profile_id=$restaurant->id;
        $conversion->product= $request->product;
        $conversion->item= $request->item;
        $conversion->metric= $request->metric;
        $conversion->quantity= $request->quantity;
        $conversion->save();

        return redirect()->route('conversions')->with('success','Conversion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conversion= Conversion::find($id);
        $conversion->delete();

        return redirect()->route('conversions')->with('success','Conversion deleted successfully');
    }
}
