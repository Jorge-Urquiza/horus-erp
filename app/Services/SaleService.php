<?php

namespace App\Services;

use App\Interfaces\SaleServiceInterface;
use App\Models\Sale;

class SaleService implements SaleServiceInterface{

    public function getSaleData($saleId){

        //$sale = Sale::with('seller', 'branchOffice', 'customer')->find($saleId);

    //$details = SaleDetail::with('product')->where('sale_id', $saleId)->get();

        return $saleId;
    }
}

