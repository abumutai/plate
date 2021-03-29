<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $guarded=[];
    public function restaurant_profile()
    {
        return $this->belongsTo(RestaurantProfile::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeFilterSearch($query)
    {
        $search = request()->input('search_item', null);

        $q1 = $query->when($search, function ($q, $search) {
            return $q->where('title', 'like', '%' . $search . '%');
        });

        return $q1;
    }
    public function getFullPricingAttribute()
    {
        return  toCamelCase("{$this->currency} {$this->pricing}");

        //  $min= number_format(($this->min_salary), 0, '.', ',');
    }
    public function menu_ingredients(){
        return $this->hasMany(MenuIngredient::class);
    }
    public function menu_sizes(){
        return $this->hasMany(MenuSize::class);
    }
    public function temp_orders(){
        return $this->hasMany(TempOrder::class);
    }
}
