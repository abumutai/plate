<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     protected $fillable = [
       'rest_id', 'user_id', 'order_id', 'payment_code', 'amount', 'payment_date_time', 'status',
    ];
}
