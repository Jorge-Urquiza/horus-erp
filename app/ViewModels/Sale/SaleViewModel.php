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
        $this->sale = $sale->with('seller', 'customer' , 'branchOffice')->first();

    }

    public function details()
    {
        return SaleDetail::with('product')
                ->where('sale_id', $this->sale->id)->get();
    }
}
