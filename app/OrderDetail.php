<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
     protected $fillable = [
       'note', 'estate', 'full_name', 'email', 'phone', 'house', 'house_no','city', 'delivery_day', 'delivery_time','estate','order_id'
    ];
}
