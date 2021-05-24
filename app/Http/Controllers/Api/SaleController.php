<?php

namespace App\Http\Controllers\Api;

use App\Models\BranchOffice;
use App\Models\BranchsProduct;
use App\Models\Customer;
use App\Models\Product;

class SaleController
{
    public function getCustomer(Customer $user)
    {
        return response()->json($user);
    }

    public function getProduct($product)
    {
        $product = BranchsProduct::where('branch_office_id', auth()->user()->branch_office_id)
            ->where('product_id', $product)
            ->with('product', 'product.measurementsUnit', 'product.brand', 'product.category')
            ->first();

        return response()->json($product);
    }
}
