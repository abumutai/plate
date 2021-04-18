<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use Illuminate\Http\Request;

class MetricsController extends Controller
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
        $metrics= Metric::where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $metrics=Metric::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $metrics=Metric::where('restaurant_profile_id',$restaurant->id)->where('name',$request->value)->paginate(20);
        }
        
        return view('metrics.index',compact('metrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metrics.create');
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
            'name'=>'required'
        ]);
        $metric= new Metric;
        $metric->name= $request->name;
        $metric->restaurant_profile_id=$restaurant->id;
        $metric->save();

        return redirect()->route('metrics')->with('success','Metric added successfully');
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
        $metric= Metric::findOrFail($id);
        return view('metrics.edit',compact('metric')); 
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
        ]);
        $metric= Metric::findOrFail($id);
        $metric->name= $request->name;
        $metric->restaurant_profile_id=$restaurant->id;
        $metric->save();

        return redirect()->route('metrics')->with('success','Metric updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metric= Metric::findOrFail($id);
        $metric->delete();

        return redirect()->route('metrics')->with('success','Metric deleted successfully');
    }
}
