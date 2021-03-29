<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AvailableStock extends Model
{
    use HasFactory;



    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
