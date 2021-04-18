<?php

namespace App\Models;

use App\Models\AvailableStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;
    protected $guarded= '*';
   // protected $table='subcategories';

    public function availablestock()
    {
        return $this->hasOne(AvailableStock::class);
    }
}
