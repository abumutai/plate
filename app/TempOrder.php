<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempOrder extends Model
{
    protected $guarded=[];
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function restaurant_profile(){
        return $this->belongsTo(RestaurantProfile::class);
    }

    public function temp_ingredients(){
        return $this->hasMany(TempIngredient::class);
    }
    public function menu_size(){
        return $this->belongsTo(MenuSize::class);
    }
}
