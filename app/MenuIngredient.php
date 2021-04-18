<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuIngredient extends Model
{protected $guarded=[];
    public function ingredient(){
        return $this->belongsTo(Ingredient::class);
    }
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function temp_ingredient(){
        return $this->hasOne(TempIngredient::class);
    }
}
