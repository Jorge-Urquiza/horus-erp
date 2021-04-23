<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;

class SaleController extends Controller
{
    public function getCustomer(Customer $user)
    {
        return response()->json($user);
    }
    public function getProduct($product)
    {
        
        $product = Product::where('id','=',$product)
                    ->with('measurementsUnit')->first();

        return response()->json($product);
    }
}
