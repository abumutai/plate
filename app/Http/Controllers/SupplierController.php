<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $categories= Category::where('restaurant_profile_id',$restaurant->id);
        $suppliers= Supplier::where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $suppliers=Supplier::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $suppliers=Supplier::where('restaurant_profile_id',$restaurant->id)->where('name','like','%'.$request->value.'%')->paginate(20);
        }
         return view('suppliers.index',compact('categories','suppliers'));
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
        $categories=Category::all()->where('restaurant_profile_id','==',$restaurant->id);
        return view('suppliers.create',compact('categories'));
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
        $validated=$request->validate([
            'name'=>'required|string',
            'email'=>'email',
            'phone'=>'required',
            'category'=>'required'
        ]);
        $supplier= new Supplier;
        $supplier->name= $request->name;
        $supplier->restaurant_profile_id=$restaurant->id;
        $supplier->email=$request->email;
        $supplier->phone=$request->phone;
        $supplier->category= $request->category;
        $supplier->save();

        return redirect()->route('suppliers')->with('success','Supplier added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $categories=Category::all()->where('restaurant_profile_id',$restaurant->id);
        $supplier= Supplier::findOrFail($id);

        return view('suppliers.edit',compact('categories','supplier'));
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
        $validated=$request->validate([
            'name'=>'required|string',
            'email'=>'email',
            'phone'=>'required',
            'category'=>'required'
        ]);
        $supplier= Supplier::findOrFail($id);
        $supplier->name= $request->name;
        $supplier->restaurant_profile_id=$restaurant->id;
        $supplier->email=$request->email;
        $supplier->phone=$request->phone;
        $supplier->category= $request->category;
        $supplier->save();

        return redirect()->route('suppliers')->with('success','Supplier edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=  Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers')->with('success','Supplier deleted successfully');
    }
}
