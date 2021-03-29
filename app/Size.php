<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function menu_size(){
        return $this->hasOne(MenuSize::class);
    }
}
