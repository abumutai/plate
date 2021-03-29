<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function getCities(Country $country)
    {
        return response()->json($country->cities->pluck("name", "id"));
    }
}
