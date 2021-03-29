<?php

namespace App\Http\Controllers;

use App\RestaurantProfile;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;



use App\RestaurantService;

use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    use Notifiable;
    public function qrCodeResponse(RestaurantProfile $restaurant)
    {
        return redirect()->route('pages.restaurants.menu', $restaurant);
    }

    public function addToGallery(RestaurantProfile $restaurant)
    {
        $data = request()->validate([
            'summary' => ['required'],
            'file' => []
        ]);
        $files = request()->file('file');

        if (request()->hasFile('file')) {

            foreach ($files as $file) {
                $imagePath = $file->store('gallery', 'images');
                $url = Storage::disk('images')->url($imagePath);
                $gallery = $restaurant->galleries()->create([
                    'image' => $url,
                    'summary' => $data['summary']
                ]);

                // dd($gallery);
            }
        }

        return redirect()->back();
    }

    public function reviewRestaurant()
    {
        $data = request()->validate([
            'restaurant_profile_id' => [],
            "food_review" => [],
            "price_review" => [],
            "punctuality_review" => [],
            "courtesy_review" => [],
            'comment' => [],
        ]);
        $user = auth()->user();
        $customer = $user->customer_profile;
        if (!$customer)
            return redirect()->back()->with('error', 'This action is only for customers');
        $data['customer_profile_id'] = $customer->id;
        $review = $customer->reviews()->create($data);
        return redirect()->back();
    }
    
    public function showWaiters()
    {
        $user = auth()->user();
     
        $users = User::where('role_id',4)->where('restaurant_profile_id',$user->restaurant_profile_id)->get();
        return view('portal.waiter_list', compact('user','users'));
   
    }
    public function waiterDashboard()
    {
        $user = auth()->user();
     
        return view('portal.waiterdashboard', compact('user'));
   
    }
    
    public function addWaiter()
    {

        $data = request()->validate([
            'name' => [],
            "email" => [],
            "password" => [],
            "role_id" => [],
            "restaurant_profile_id" => [],
            'comment' => [],
        ]);
      
        $user = auth()->user();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 4,
            'email_verified_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'restaurant_profile_id' => $user->restaurant_profile_id ?? null
        ]);
        $user = auth()->user();
        $deletedRows = RestaurantProfile::where('title', NULL)->delete();

        // $users = User::where('role_id',4)->where('restaurant_profile_id',$user->restaurant_profile_id)->get();
        return redirect()->back()->with("success", "Changes saved successfully");
   
    }

    public function updateProfile()
    {

        $data = request()->validate([
            'title' => [],
            'headline' => [],
            'category_id' => [],
            'location' => [],
            'city_id' => [],
            'country_id' => [],
            'phone' => [],
            'email' => [],
            'postal_address' => [],
            'logo' => [],
            'website' => [],
            'kula_points_ratio' => [],
            'delivery_fee' => [],


        ]);


        $dataservices = request()->validate([
            'service' => []
        ]);
        $user = auth()->user();

        // $delivery_ratio = 100 / ($data['kula_points_ratio']) ;
        // $delivery_fee = ($data['delivery_fee']);
        if (request()->hasFile('logo')) {
            $file = request()->file('logo');
            $imagePath = request()->file('logo')->store('logos', 'images');
            $url = Storage::disk('images')->url($imagePath);
            $imageArray = ['logo' => $url];
        }
        if (request()->hasFile('banner')) {
            $file = request()->file('banner');
            $imagePath = request()->file('banner')->store('banner', 'images');
            $url = Storage::disk('images')->url($imagePath);
            $imageArray = ['banner' => $url];
        }
        $user->restaurant_profile->update(array_merge(
            $data,
            $imageArray ?? []

        ));

       


      //  foreach ($dataservices as  $val) {
         //   dd($val[$i]);
            RestaurantService::updateOrCreate(
                [
                    'restaurant_profile_id' =>  $user->restaurant_profile->id,
                    'service_id' => 1
                ],
                [
                    'restaurant_profile_id' =>  $user->restaurant_profile->id,
                    'service_id' => 1
                ]

            );

            RestaurantService::updateOrCreate(
                [
                    'restaurant_profile_id' =>  $user->restaurant_profile->id,
                    'service_id' => 2
                ],
                [
                    'restaurant_profile_id' =>  $user->restaurant_profile->id,
                    'service_id' => 2
                ]

            );
            RestaurantService::updateOrCreate(
                [
                    'restaurant_profile_id' =>  $user->restaurant_profile->id,
                    'service_id' => 3
                ],
                [
                    'restaurant_profile_id' =>  $user->restaurant_profile->id,
                    'service_id' => 3
                ]

            );
        //}



        return redirect()->back()->with("success", "Changes saved successfully");
    }
}
