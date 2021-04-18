<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Notifications\NewOrderReceived;
use App\RestaurantProfile;
use App\RestaurantService;
use Illuminate\Http\Request;
use App\TempOrder;
use App\Order;
use App\OrderDetail;
use PDF;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function cartAdd(Menu $menu)
    {

        $data = request()->validate([
            'menu_ingredients' => 'array',
            'menu_ingredients.*' => 'string',
            'menu_size_id' => [],



        ]);
       // Order::with('id'=> $order_id)->notify(new NewOrderReceived($order));

        $user = auth()->user();

        $temp_order = $menu->temp_orders()->create(
            [
                'user_id' => $user->id,
                'restaurant_profile_id' => $menu->restaurant_profile->id,
                'menu_size_id' => $data['menu_size_id']

            ]
        );
        if (isset($data['menu_ingredients']))
            foreach ($data['menu_ingredients'] as $key => $val) {
                $temp_order->temp_ingredients()->create([
                    'menu_ingredient_id' => $val
                ]);
            }

        return json_encode(array('message' => 'Item ' . $temp_order->menu->title . ' added to cart, successfully.'));
    }

    public function createPDF() {
        // retreive all records from db
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $orders=$user->restaurant_profile->orders;
  
        // share data to view
        view()->share('portal.today_order_report', compact($user, $restaurant, $orders));
        $pdf = PDF::loadView('portal.today_order_report', compact($user, $restaurant, $orders));
  
        // download PDF file with download method
        return $pdf->download('today_report.pdf');
      }

    public function pending($order_id)
    {
        try {

            Order::where(['id' => $order_id])->update(['status' => '1']);

            return redirect('/portal/orders')->with('success', 'Order has been set to pending');
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('error', 'An error occured while activating restaurant ');
        }
    }
  

    public function processing($order_id)
    {
        try {

            Order::where(['id' => $order_id])->update(['status' => '2']);
            //Order::where(['id' => $order_id])->notify(new NewOrderReceived());;

            return redirect('/portal/orders')->with('success', 'Order is being processed');
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('error', 'An error occured while activating restaurant ');
        }
    }

    public function completed($order_id)
    {
        try {

            Order::where(['id' => $order_id])->update(['status' => '3']);

            return redirect('/portal/orders')->with('success', 'Order has been completed');
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('error', 'An error occured while activating restaurant ');
        }
    }

    public function cancelled($order_id)
    {
        try {

            Order::where(['id' => $order_id])->update(['status' => '4']);

            return redirect('/portal/orders')->with('success', 'Order has been cancelled');
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('error', 'An error occured while activating restaurant ');
        }
    }
    
   
    
   
    public function cartComplete(RestaurantProfile $restaurant)
    {
        $data = request()->validate([
            'restaurant_service_id' => [],
        ]);
        //   $user = auth()->user();
        //dd($data);
        session(['restaurant_service_id' =>  $data['restaurant_service_id'] ?? 3]);

        return redirect()->route('order.step2', $restaurant);
    }

    public function orderStep2(RestaurantProfile $restaurant)
    {
        $restaurant_service = RestaurantService::find(session('restaurant_service_id'));
        $user = auth()->user();
        return view('pages.cart1', compact('user', 'restaurant', 'restaurant_service'));
    }
    public function updateOrderStatus(Request $request)
    {

        $order = Order::find(session('order_id'));
        // $order = Order::find($request->order_id);
        //  dd($request->status);
        $order->update([
            'status' => $request->status,

        ]);
        $user = auth()->user();
        $restaurant = $user->restaurant_profile;

        if ($order) {
            return view('portal.orders_list', compact('user', 'restaurant'));
        }
        return 'an error occured';
    }



    public function orderStep3(RestaurantProfile $restaurant)
    {
        $data = request()->validate([
            'table_id' => [],
            'note' => [],
            'estate' => [],
            'full_name' => [],
            'email' => [],
            'phone' => [],
            'city' => [],
            'house' => [],
            'house_no' => [],
            'delivery_schedule_time' => [],
            'delivery_schedule_day' => []
        ]);


        //var_dump($data);
        $user = auth()->user();

        $restaurant_service = RestaurantService::find(session('restaurant_service_id'));

        $temp_orders = TempOrder::where([['user_id', '=', $user->id], ['restaurant_profile_id', '=', $restaurant->id]])->get()->unique('menu_id');
        foreach ($temp_orders as $temp_order)
            $order = $restaurant->orders()->create([
                'restaurant_service_id' => $restaurant_service->id,
                'user_id' => $user->id,
                'menu_id' => $temp_order->menu_id,
                'quantity' => \App\TempOrder::where('menu_id', $temp_order->menu_id)->get()->count(),
                'table_id' => $data['table_id'] ?? null,
                'notes' => $data['notes'] ?? null,
                'status' => 1

            ]);


        if ($restaurant_service->id == 2) {


            foreach ($temp_orders as $temp_order)
                $order_details = OrderDetail::create([
                    'note' => $data['note'],
                    'estate' =>  $data['estate'],
                    'full_name' =>  $data['full_name'],
                    'email' =>  $data['email'],
                    'note' =>  $data['note'],
                    'phone' =>  $data['phone'],
                    'house' =>  $data['house'],
                    'house_no' =>  $data['house_no'],
                    'city' =>  $data['city'],
                    'delivery_day' =>  $data['delivery_schedule_time'],
                    'delivery_time' =>  $data['delivery_schedule_day'],
                    'order_id' => $order->id
                ]);
        }

    
       // foreach ($temp_orders as $temp_order)
     //  $temp_order->delete();

        return view('pages.cart2', compact('user', 'restaurant', 'restaurant_service'));
    }
}
