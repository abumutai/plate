<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantProfile extends Model
{
    protected $guarded = [];
    public function restaurant_services()
    {
        return $this->hasMany(RestaurantService::class);
    }
    public function ratings(){
        return $this->hasMany(Rating::class);
    }
    public function menus(){
        return $this->hasMany(Menu::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }
    public function temp_orders(){
        return $this->hasMany(TempOrder::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function getFullAddressAttribute()
    {
        return toCamelCase("{$this->city->name}, {$this->country->name}");
    }
    public function points(){
        return $this->hasMany(Point::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function tables()
    {
        return $this->hasMany(Table::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
