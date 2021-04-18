<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function restaurant_profile()
    {
        return $this->hasMany(RestaurantProfile::class);
    }
    public function customer_profile()
    {
        return $this->hasOne(CustomerProfile::class);
    }
}
