<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuSize extends Model
{
    protected $guarded=[];
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function temp_order(){
        return $this->hasOne(TempOrder::class);
    }
}
