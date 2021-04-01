<?php

namespace App\Http\Controllers;

use App\Order;
use App\Table;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;




use Illuminate\Support\Facades\Config;

class PortalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        return view('portal.dashboard',compact('user','restaurant'));
    }
     public function menuList(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        return view('portal.menu_list',compact('user','restaurant'));
    }
    public function qrCodeView(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $url=route('qr.response',$restaurant);
        $code=\QrCode::size(300)/*->format('png')
            ->merge(asset('images/aset.png'), .3,true)*/
            ->color(106, 27, 154)
            ->generate($url);
/*
 * $image = QrCode::format('png')
    ->merge('folder/image.png', 0.5, true)
    ->size(500)->errorCorrection('H')
    ->generate('MyNotePaper');

return response($image)->header('Content-type','image/png');
 */
        return view('portal.qr_code_view',compact('user','restaurant','code'));

    }

  
    public function gallery(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;

        $breadcrumbs = [
            ['link'=>route('landing'),'name'=>config('app.name', 'Sahani')],['link'=>route('dashboard'),'name'=>"Portal"], ['name'=>"Gallery"]
        ];

        return view('portal.gallery',compact('user','restaurant','breadcrumbs'));

    }
    public function ingredientList(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        $ingredients=$user->restaurant_profile->ingredients;
        return view('portal.ingredient_list',compact('user','ingredients','restaurant'));
    }

    public function viewOrders(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
      
        return view('portal.orders_list',compact('user','restaurant'));
    }
    public function viewCompletedOrders(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        return view('portal.completed_orders_list',compact('user','restaurant'));
    }
    

    public function viewCustomerOrders(){
        $user=auth()->user();
        $orders=$user->orders;
        return view('portal.customer_orders_list',compact('user','orders'));
    }
    public function viewCompletedCustomerOrders(){
        $user=auth()->user();
        $orders=$user->orders;
        return view('portal.customer_completed_orders_list',compact('user','orders'));
    }
    
    public function profile(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
      
        return view('portal.profile',compact('user','restaurant'));

    }
    public function UserProfile(){
        $user=auth()->user();
      
        return view('portal.user_profile',compact('user'));

    }
    public function updateProfile()
    {
        $data = request()->validate([
            'name' => [],
            'phone' => [],
            'logo'=>[]
            

        ]);
        $user = auth()->user();
      
        if (request()->hasFile('logo')) {
            $file = request()->file('logo');
            $imagePath = request()->file('logo')->store('logos', 'images');
            $url = Storage::disk('images')->url($imagePath);
            $imageArray = ['logo' => $url];
        }
        if(empty($data['logo'])){
            $url = $user->avatar;
        }

  
        $user->update([
            'name' =>$data['name'],
            'phone' =>$data['phone'],
            'avatar' =>$url
        ]);
    
  
        return redirect()->back()->with("success", "Changes saved successfully");
    }

    public function viewTables(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
       
        $tables = Table::where('restaurant_profile_id',$restaurant->id)->get();
        return view('portal.restaurant_configs',compact('user','tables'));

    }
    public function kulaPoints(){
        $user=auth()->user();
        $restaurant=$user->restaurant_profile;
        return view('portal.profile',compact('user','restaurant'));

    }
    public function addTable(Request $request){

        $data = request()->validate([
            'title' => ['required'],
          
        ]);
        $user=auth()->user();
        $restaurant=$user->restaurant_profile->id;
        $table = Table::create([
            'title' => $data['title'],
            'status' => 0,

             'restaurant_profile_id' => $restaurant
        ]);
        $tables = Table::where('restaurant_profile_id',$restaurant)->get();
     
        return view('portal.restaurant_configs',compact('user','tables'));
    

    }

    public function deleteTable(Request $request)
    {
     
          
            // $table = Table::find($request->id);
         
            // $table->update([
            //     'status' => $request->status,
                
            // ]);

            $table=Table::where('id',$request->id)->delete();
            $user = auth()->user();
            $restaurant=$user->restaurant_profile;
            $tables = Table::where('restaurant_profile_id',$restaurant)->get();

            if($table){
                return view('portal.restaurant_configs',compact('user','tables'));
            }
            return 'an error occured';
     
    }

}
