<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function restaurant_profile()
    {
        return $this->hasOne(RestaurantProfile::class);
    }
    public function customer_profile()
    {
        return $this->hasOne(CustomerProfile::class);
    }
}
