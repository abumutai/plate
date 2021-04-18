<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class SubcategoriesController extends Controller
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
        $subcategories= Subcategory::where('restaurant_profile_id',$restaurant->id);
        $subcategories= Subcategory::where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $subcategories=Subcategory::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $subcategories=Subcategory::where('restaurant_profile_id',$restaurant->id)->where('name',$request->value)->paginate(20);
        }
        return view('subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategories.create');
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
        $validated= $request->validate([
            'name'=>'required',
            'threshold'=>'required|integer'
        ]);
       
        $subcategory= new Subcategory;
        $monitor=False;
        if($request->has('monitor'))
        {
            $monitor=True;
        }
        $subcategory->name= $request->name;
        $subcategory->monitor= $monitor;
        $subcategory->restaurant_profile_id=$restaurant->id;
        $subcategory->threshold= $request->threshold;
        $subcategory->save();

        return redirect()->route('subcategories')->with('success','Subcategory added successfully');
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
        
        $subcategory= Subcategory::findOrFail($id);
        return view('subcategories.edit',compact('subcategory')); 
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
            'name'=>'required',
            'threshold'=>'required|integer'
        ]);
        $subcategory= Subcategory::findOrFail($id);
        $subcategory->name= $request->name;
        $subcategory->restaurant_profile_id=$restaurant->id;
        $subcategory->threshold= $request->threshold;
        $subcategory->save();

        return redirect()->route('subcategories')->with('success','Subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory=  Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('subcategories')->with('success','Subcategory deleted successfully');
    }
}
