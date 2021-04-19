<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Stock;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Models\Consumedstock;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class StockChart extends BaseChart
{
    public function __construct(Request $request)
    {
       $this->stocks1=Stock::whereDate('created_at',today())->sum(DB::raw('price*quantity'));
         $this->stocks2=Stock::whereDate('created_at',today()->subDays(1))->sum(DB::raw('price*quantity'));
         $this->stocks3=Stock::whereDate('created_at',today()->subDays(2))->sum(DB::raw('price*quantity'));
         $this->stocks4=Stock::whereDate('created_at',today()->subDays(3))->sum(DB::raw('price*quantity'));
         $this->stocks5=Stock::whereDate('created_at',today()->subDays(4))->sum(DB::raw('price*quantity'));
         $this->stocks6=Stock::whereDate('created_at',today()->subDays(5))->sum(DB::raw('price*quantity'));
         $this->stocks7=Stock::whereDate('created_at',today()->subDays(6))->sum(DB::raw('price*quantity'));
         $this->stocks8=Stock::whereDate('created_at',today()->subDays(7))->sum(DB::raw('price*quantity'));

         $this->stocks8=Consumedstock::whereDate('created_at',today())->sum(DB::raw('price*quantity'));
         $this->stocks9=Consumedstock::whereDate('created_at',today()->subDays(1))->sum(DB::raw('price*quantity'));
         $this->stocks10=Consumedstock::whereDate('created_at',today()->subDays(2))->sum(DB::raw('price*quantity'));
         $this->stocks11=Consumedstock::whereDate('created_at',today()->subDays(3))->sum(DB::raw('price*quantity'));
         $this->stocks12=Consumedstock::whereDate('created_at',today()->subDays(4))->sum(DB::raw('price*quantity'));
         $this->stocks13=Consumedstock::whereDate('created_at',today()->subDays(5))->sum(DB::raw('price*quantity'));
         $this->stocks14=Consumedstock::whereDate('created_at',today()->subDays(6))->sum(DB::raw('price*quantity'));
         $this->stocks15=Stock::whereDate('created_at',today()->subDays(6))->sum(DB::raw('price*quantity'));
      //dd($this->stocks3);
    }
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    { 
       
        return Chartisan::build()
            ->labels(['7 Days Ago','6 Days Ago','5 Days Ago','4 Days Ago','3 Days Ago','2 Days Ago','Yesterday','Today'])
            ->dataset('Stock Added', [$this->stocks8,$this->stocks7,$this->stocks6,$this->stocks5,$this->stocks4,$this->stocks3,$this->stocks2,$this->stocks1])
            ->dataset('Stock Moved', [$this->stocks15,$this->stocks14,$this->stocks13,$this->stocks12,$this->stocks11,$this->stocks10,$this->stocks9,$this->stocks8]);
           // ->dataset('Stock Consumed', [1000,1900,800,1700,600,500,1400,300, 1200, 1000]);
    }
}