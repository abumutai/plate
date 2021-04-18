<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];
    public function restaurant_profile(){
        return $this->belongsTo(RestaurantProfile::class);
    }
    public function restaurant_service(){
        return $this->belongsTo(RestaurantService::class);
    }
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
