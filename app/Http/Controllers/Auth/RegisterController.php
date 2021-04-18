<?php

namespace App\Http\Controllers\Auth;

use App\EmployerProfile;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\RestaurantProfile;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer'],

            /**From employer sign up*/
            'rst_name' => [],
            'rst_email' => [],
            'rst_phone' => [],
            'type' => [],
            'terms_check' => []

        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = null;
        $restaurant = null;
      // dd($data);

        if (isset($data["terms_check"]))
            $restaurant = RestaurantProfile::create(
                [ 
                'title' => $data['rst_name'],
                'email' => $data['email'],
                'phone'=>$data['rst_phone'],
                'website'=>$data['website'],
                ]
            );

        $user =
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id' => $data["role"],
                'restaurant_profile_id' => $restaurant->id ?? null
            ]);
          
        return $user;
    }

    function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        session()->flash('message', 'Registration successfully, dont forget to very your email address');
        //code adding extra row on restaurant profile,delete hack, remember to fix
        $deletedRows = RestaurantProfile::where('title', NULL)->delete();

      
        return redirect('/verify')->with('success', 'verify');
        // if ($user->role_id < 3)
        //     return redirect()->route('dashboard');
        // else
        //     return true;
        /*
         * if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath());
         */
    }
    public function showRegistrationForm()
    {
        return redirect()->back()->with('register',true);
    }
}
