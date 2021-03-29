<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded=[];
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function restaurant_profile(){
        return $this->belongsTo(RestaurantProfile::class);
    }
    public function menu_ingredient(){
        return $this->hasOne(MenuIngredient::class);
    }

}
