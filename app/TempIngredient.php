<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempIngredient extends Model
{
    protected $guarded=[];
    public  function menu_ingredient(){
        return $this->belongsTo(MenuIngredient::class);
    }
    public  function temp_order(){
        return $this->belongsTo(TempOrder::class);
    }
}
