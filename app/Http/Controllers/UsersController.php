<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
    public function index()
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $users=User::all()->where('restaurant_profile_id',$restaurant->id);
        return view('users.index',compact('users','restaurant'));
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
        return view('users.create',compact('restaurant'));
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
            'name'=>'required|string',
            'email'=>'email|required|unique:users',
            'title'=>'required|string',
            'section'=>'required|string',
            'role'=>'required',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->email_verified_at=now();
        $user->role_id=5;
        if($request->role=='admin')
        {
            $user->role_id=2;
        }
        else{
            $user->role_id=5;
        }
        $user->restaurant_profile_id=$restaurant->id;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('users')->with('restaurant','success','User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $user=User::findOrFail($id);
        return view('users.show',compact('user','restaurant'));
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
        $user=User::findOrFail($id);
        return view('users.edit',compact('user','restaurant'));
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
        //
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
     
        $user=User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('users')->with('restaurant','success','User deleted successfully');
    }
}
