<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected  $guarded=[];
    public function customer_profile()
    {
        return $this->belongsTo(CustomerProfile::class);
    }
    public function restaurant_profile()
    {
        return $this->belongsTo(RestaurantProfile::class);
    }
}
