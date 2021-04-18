<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded= '*';
    protected $table='stocks';
    protected $dates = ['expiry'];
    public function subcategory()
    {
        return $this->hasOne(Subcategory::class);
    }
}

