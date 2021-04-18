<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $categories= Category::where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $categories=Category::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $categories=Category::where('restaurant_profile_id',$restaurant->id)->where('name',$request->value)->paginate(20);
        }
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name'=>'required'
        ]);
        $category= new Category;
        $category->restaurant_profile_id=$restaurant->id;
        $category->name= $request->name;
        $category->save();

        return redirect()->route('categories')->with('success','Category added successfully');
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
        
        $category= Category::findOrFail($id);
        return view('categories.edit',compact('category')); 
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
            'name'=>'required',
        ]);
        $category= Category::findOrFail($id);
        $category->name= $request->name;
        $category->restaurant_profile_id=$restaurant->id;
        $category->save();

        return redirect()->route('categories')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories')->with('success','Category deleted successfully');
    }
}
