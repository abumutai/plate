<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /*
   * override
   */
    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')->where('email', $request->input('email'))->first();

        if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            $user = auth()->guard('web')->user();

            if ($user->role->id == 1)
                return json_encode(array('status' => true, 'url' => route('admin.dashboard')));

            elseif ($user->role->id == 2)
                return json_encode(array('status' => true, 'url' => route('orders')));
            elseif ($user->role->id == 4)
                return json_encode(array('status' => true, 'url' => route('waiter.dashboard')));
            elseif ($user->role->id == 5)
                return json_encode(array('status' => true, 'url' => route('kitchen.home')));
            else
                return json_encode(array('status' => true, 'url' => route('customer.orders')));
        }
        return json_encode(array('status' => false, 'url' => ''));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        Session::flush();
        session()->flash('message', 'You have logged out successfully');
        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }

    public function showLoginForm()
    {
        return redirect()->back()->with('login', 'true');
    }
}
