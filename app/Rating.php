<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function restaurant_profile()
    {
        return $this->belongsTo(RestaurantProfile::class);
    }
}
