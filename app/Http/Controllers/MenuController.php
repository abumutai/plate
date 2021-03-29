<?php

namespace App\Http\Controllers;

use App\RestaurantProfile;
use Illuminate\Support\Facades\Storage;
use App\Menu;
use App\TempOrder;

class MenuController extends Controller
{
    public function addMenu()
    {
        $data = request()->validate([
            'title' => '',
            'description' => '',
            'currency' => '',
            'pricing' => '',
            'image' => '',
            'category_id' => '',

            'size_checkbox' =>  "array",
            'size_checkbox.*' =>  "",

            'size_pricing' => 'array',
            'size_pricing.*' => '',

            "ingredients" => "array",
            "ingredients.*" => "",
        ]);
        $user = Auth()->user();

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $check_file = checkFileState($file);
            if (!$check_file['status'])
                return redirect()->back()->with('error', $check_file["message"]);
            $imagePath = request()->file('image')->store('menus', 'images');
            $url = Storage::disk('images')->url($imagePath);
            $imageArray = ['image' => $url];
        }

        $ingredients=[];
        $size_pricing=[];
        if (isset($data['ingredients'])){
            $ingredients=$data['ingredients'];
            unset($data['ingredients']);
        }
         if (isset($data['size_checkbox'])){
             foreach ($data['size_checkbox'] as $key => $val) {
                 $size_price=$data['size_pricing'][$val];
                 $size_pricing[$val]=$size_price;
             }
             unset($data['size_checkbox']);
         }
        unset($data['size_pricing']);

        $menu = $user->restaurant_profile->menus()->create(array_merge(
            $data,
            $imageArray ?? []
        ));

       foreach ($size_pricing  as $key=>$val){
           $menu->menu_sizes()->create([
               'size_id' => $key,
               'pricing' => $val
           ]);
       }

            foreach ($ingredients as $key => $val) {
               $menu->menu_ingredients()->create([
                  'ingredient_id'=>$val
               ]);
            }


        return redirect()->back()->with("success", "Changes saved successfully");

    }

    public function addIngredient(RestaurantProfile $restaurant)
    {
        $data = request()->validate([
            'title' => '',
            'description' => '',
            'currency' => '',
            'pricing' => '',
        ]);
        $restaurant->ingredients()->create($data);
        return redirect()->back()->with("success", "Changes saved successfully");

    }


    
    public function deleteCart($order_id)
    {
      
        TempOrder::where(['id' => $order_id])->delete();
        return redirect()->back()->with("success", "Changes saved successfully");
        
    }

      //Change order status
      public function delete($order_id)
      {
          try {
  
              Menu::where(['id' => $order_id])->delete();
                 return redirect('/portal/menu/all')->with('success', 'Menu Updated');
          } catch (\Exception $e) {
              return redirect('portal/dashboard')->with('error', 'An error occured while updating menu restaurant ');
          }
      }
      public function destock($order_id)
      {
          try {
  
              Menu::where(['id' => $order_id])->update(['status' => '1']);
  
              return redirect('/portal/menu/all')->with('success', 'Menu Updated');
          } catch (\Exception $e) {
              return redirect('portal/dashboard')->with('error', 'An error occured while updating menu restaurant ');
          }
      }
      public function restock($order_id)
      {
          try {
  
              Menu::where(['id' => $order_id])->update(['status' => '0']);
  
              return redirect('/portal/menu/all')->with('success', 'Menu Updated');
          } catch (\Exception $e) {
              return redirect('portal/dashboard')->with('error', 'An error occured while updating menu restaurant ');
          }
      }
}
