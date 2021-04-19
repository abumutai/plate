<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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
        $expenses=Expense::where('restaurant_profile_id',$restaurant->id);
        if($request->value==null){
            $expenses= Expense::where('restaurant_profile_id',$restaurant->id)->paginate(20);
        }
        else{
            $expenses=Expense::where('restaurant_profile_id',$restaurant->id)->where('name','like','%'.$request->value.'%')->paginate(20);
        }
        return view('expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
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
    
        $data=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'amount'=>'required|integer'
        ]);
        $expense=new Expense;
        $expense->name=$request->name;
        $expense->description = $request->description;
        $expense->restaurant_profile_id=$restaurant->id;
        $expense->amount=$request->amount;
        $expense->user=auth()->user()->name;
        $expense->save();

        return redirect()->route('expenses')->with('success','Expense added successfully');
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
        $expense=Expense::findOrFail($id);
        return view('expenses.edit',compact('expense'));
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
    
        $data=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'amount'=>'required|integer'
        ]);
        $expense=Expense::findOrFail($id);
        $expense->name=$request->name;
        $expense->description = $request->description;
        $expense->amount=$request->amount;
        $expense->save();

        return redirect()->route('expenses')->with('success','Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense=Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses')->with('success','Expense deleted successfully');
    }
}
