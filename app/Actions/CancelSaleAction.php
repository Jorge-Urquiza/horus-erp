<?php

namespace App\Actions;

use App\Models\BranchsProduct;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;

class CancelSaleAction
{
    private $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function execute() :void
    {
        $details = SaleDetail::where('sale_id', $this->sale->id)->get();

        foreach ($details as $detail) {
            $this->updateStock($detail);
        }

    $this->updateStatus();
    }

    private function updateStatus() : void
    {
        $this->sale->status = 'Anulada';

        $this->sale->save();
    }
    private function updateStock(SaleDetail $detail) : void
    {
        $product = Product::findOrFail($detail->product_id);

        $branchProduct = BranchsProduct::where('product_id', $product->id)
            ->where('branch_office_id', $this->sale->branch_office_id)->first();

        $quantity = $detail->quantity;



        $product->increment('total_current_stock', $quantity);


        $branchProduct->increment('current_stock', $quantity);


    }
}
