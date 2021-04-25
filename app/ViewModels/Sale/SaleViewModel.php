<?php

namespace App\ViewModels\Sale;


use App\Models\Sale;
use App\Models\SaleDetail;
use Spatie\ViewModels\ViewModel;

class SaleViewModel extends ViewModel
{
    public $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;

        $this->update();
    }
    //$this->$sale->with('seller', 'customer' , 'branchOffice')->first();
    public function details()
    {
        return SaleDetail::where('sale_id', $this->sale->id)->get();
    }

    private function update()
    {
       return $this->sale->with('seller', 'customer' , 'branchOffice')->first();
    }
}
