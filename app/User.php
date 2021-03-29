<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {

            if ($user->role_id == 3)
                $user->customer_profile()->create();
            else
                $user->restaurant_profile()->create();

            //Mail::to($user->email)->send(new NewUserWelcomeMail());
        });

    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function session()
    {
        return $this->hasOne(Session::class);
    }
    public function customer_profile()
    {
        return $this->hasOne(CustomerProfile::class);
    }
    public function temp_orders()
    {
        return $this->hasMany(TempOrder::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function restaurant_profile()
    {
        return $this->belongsTo(RestaurantProfile::class);
    }

    public function getFullNameAttribute()
    {
        return toCamelCase($this->name);
    }

    //Mutators functions definations
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

}
