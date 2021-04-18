<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Order;
use App\Reservation;
use App\RestaurantProfile;
use App\User;
use App\News;
use App\OrderDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\ResetPass;

class MobileController extends Controller
{
    // public function getRestaurants(RestaurantProfile $restaurants)
    // {
    //     return $this->jsonResponse(false, 'restaurants', 'restaurants', $restaurants);
    // }



    public function getMenuCategories(RestaurantProfile $restaurant)
    {
        $data = request()->validate([
            'category_id' => []
        ]);
        $menus = $restaurant->menus->where('category_id', $data['category_id']);
        return $this->jsonResponse(false, 'menus', 'menus', $menus);
    }

    /*
     *
     */
    public function jsonResponse($error, $message, $type, $result)
    {
        echo json_encode(array("error" => $error, "message" => $message, $type => $result));
    }


    public function loginInUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = DB::table('users')->where('email', $request->input('email'))->first();

        if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = auth()->guard('web')->user();

            return $this->jsonResponse(false, 'Successfully logged in', 'user', $user);
        }
        return $this->jsonResponse(true, 'Either the username or password is incorrect', 'user', null);
    }

    public function registerUser()
    {
        $data = request()->validate([
            'name' => [],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => [],
            'phone' => [],
            'password' => []
        ]);
        ///  var_dump($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);


        return $this->jsonResponse(false, 'User registered successfully', 'user', $user);
    }
    // public function getCategories()
    // {
    //     $data = request()->validate([
    //         'restaurant_id' => []
    //     ]);
    //     $categories = RestaurantProfile::find($data['restaurant_id'])->categories;
    //     return $this->jsonResponse(false, 'restaurants', 'categories', $categories);
    // }
    public function getCategories()
    {
        $catagories = Category::all();
        return $this->jsonResponse(false, 'Categories', 'catagories', $catagories);
    }

    public function getAllRestaurants()
    {
        $restaurants = RestaurantProfile::all();
        return $this->jsonResponse(false, 'all restaurants', 'restaurants', $restaurants);
    }

    public function getMenus()
    {
        $menus = Menu::all();
        return $this->jsonResponse(false, 'menus', 'menus', $menus);
    }




    public function getTips()
    {
        //     $tips = Tips::all();
        //     return $this->jsonResponse(false, 'news or tips', 'tips', $tips);
    }

    public function getReservations()
    {
        $data = request()->validate([
            'user_id' => ['required']
        ]);

        $reservations = DB::table('reservations')->where('user_id', $data['user_id'])->first();
        if ($reservations) {
            return $this->jsonResponse(true, 'user reservation', 'reservations', $reservations);
        }
        return $this->jsonResponse(false, 'user reservation', 'reservations', $reservations);
    }
    public function getTables()
    {
        $data = request()->validate([
            'restaurant_id' => ['required']
        ]);

        $restaurant_tables = DB::table('tables')->where('restaurant_profile_id', $data['restaurant_id'])->get();

        if ($restaurant_tables) {
            return $this->jsonResponse(true, 'restaurant tables', 'tables', $restaurant_tables);
        } else {

            return $this->jsonResponse(false, 'restaurant tables', 'tables', $restaurant_tables);
        }
    }
    public function newReservation()
    {

        $data = request()->validate([
            'user_id' => ['required'],
            "restaurant_id" => ['required'],
            'table_no' => [],
            'paybill' => [],
            'name' => [],
            'number_of_people' => [],
            'phone' => [],
            'email' => [],
            'order_list' => [],
            'address' => [],
            'status' => [],
            'comment' => [],
        ]);
        //  var_dump($data);

        $data['rest_id'] = $data['restaurant_id'];
        unset($data['restaurant_id']);
        $reservation = Reservation::create($data);
        return $this->jsonResponse(false, 'reservation created successfully', 'reservation', $reservation);
    }

    public function getMenu()
    {
        $data = request()->validate([

            "restaurant_id" => ['required']
        ]);

        $menus = DB::table('menus')->where('restaurant_profile_id', $data['restaurant_id'])->get();
        return $this->jsonResponse(false, 'Single Restaurants Menu', 'menus', $menus);
    }
    public function getRestaurants()
    {
        $data = request()->validate([

            "restaurant_id" => ['required']
        ]);
        // var_dump($data);
        $restaurants = DB::table('restaurant_profiles')->where('id', $data['restaurant_id'])->first();;
        return $this->jsonResponse(false, 'Single Restaurants', 'restaurants', $restaurants);
    }
    public function getOrders()
    {

        $data = request()->validate([
            'user_id' => ['required']
        ]);
        $orders = DB::table('orders')->where('user_id', $data['user_id'])->get();

        //$orders = Order::where(['user_id', '=', $data['user_id']], ['rest_id', '=', $data['restaurant_id']])->get();
        return $this->jsonResponse(false, 'user orders', 'orders', $orders);
    }

    //           'restaurant_service_id' => $restaurant_service->id,
    //             'user_id' => $user->id,
    //             'menu_id' => $temp_order->menu_id,
    //             'quantity' => \App\TempOrder::where('menu_id', $temp_order->menu_id)->get()->count(),
    //             'table_id' => $data['table_id'] ?? null,
    //             'notes' => $data['notes'] ?? null,
    //             'status' => 1
    public function createorder()

    {
        $data = request()->validate([
            'user_id' => ['required'],
            "restaurant_id" => ['required'],
            'restaurant_service_id' => [],
            'menu_id' => [],
            'quantity' => [],
            'table_id' => [],
            'notes' => [],


        ]);



        $restaurant =  RestaurantProfile::where('id', '=', $data['restaurant_id'])->get();

        $order =   Order::create([
            'restaurant_service_id' => $data['restaurant_service_id'],
            'user_id' => $data['user_id'],
            'restaurant_profile_id' => $data['restaurant_id'],
            'menu_id' => $data['menu_id'],
            'quantity' => $data['quantity'],
            'table_id' => $data['table_id'] ?? null,
            'notes' => $data['notes'] ?? null,
            'status' => 1

        ]);
        if ($data['restaurant_service_id'] == 2) {

            $order_details = OrderDetail::create([
                'note' => $data['note'],
                'estate' =>  $data['estate'] ?? 'estate',
                'full_name' =>  $data['full_name']  ?? 'full_name',
                'email' =>  $data['email']  ?? 'email',
                'note' =>  $data['note'] ?? 'note',
                'phone' =>  $data['phone'] ?? 'phone',
                'house' =>  $data['house'] ?? 'house',
                'house_no' =>  $data['house_no'] ?? 'house_no',
                'city' =>  $data['city'] ?? 'city',
                'delivery_day' =>  $data['delivery_schedule_time'] ?? 'delivery_day',
                'delivery_time' =>  $data['delivery_schedule_day'] ?? 'delivery_time',
                'order_id' => $order->id
            ]);
        }

        return $this->jsonResponse(false, 'order created successfully', 'order', $order);
    }


    public function resetPassword()
    {
        $data = request()->validate([
            "email" => ['required'],
        ]);
        //You can add validation login here
        $user = DB::table('users')->where('email', '=', $data['email'])->first(); //Check if the user exists

        if (!$user) {
            return $this->jsonResponse(true, 'User does not exist', 'user', $user);
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $data['email'],
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]); //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $data['email'])->first();



        if ($this->sendResetEmail($data['email'], $tokenData->token)) {
            return $this->jsonResponse(false, 'A reset link has been sent to your email address.', 'user', $user);
        } else {

            return $this->jsonResponse(true, 'A Network Error occurred. Please try again.', 'user', $user);
        }
    }

    private function sendResetEmail($email, $token)
    { //Retrieve the user from the database
        $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();

       
        //Generate, the password reset link. The token generated is embedded in the link
        $link = url(config('app.url') . route('password.reset', $token, false));
        //config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);

        try {
            //Here send the link with CURL with an external email API
            $data = [
                "user" => $user->name, "url" => $link, 'subject' => "Reset Password Notification", "from" => 'techxers@gmail.com'
            ];

           Mail::to($email)
                ->send(new ResetPass($data));
             
            return true;
        } catch (\Exception $e) {

          echo $e;

            return false;
        }
    }
}
