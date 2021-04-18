<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $guarded=[];
    public function restaurant_profile(){
        return $this->belongsTo(RestaurantProfile::class);
    }
}
