<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function restaurant_service()
    {
        return $this->hasOne(RestaurantService::class);
    }
}
