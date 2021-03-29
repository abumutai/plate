<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
       'user_id', 'rest_id', 'name', 'table_no', 'number_of_people', 'phone', 'email', 'order_list', 'address', 'status', 'comment',
    ];
}
