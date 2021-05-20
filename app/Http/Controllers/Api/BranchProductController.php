<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BranchsProduct;

class BranchProductController extends Controller
{
    public function getProductByBranch($id)
    {
        $product = BranchsProduct::where([['branch_office_id','=',$id],['current_stock', '>', 0]])->with('product')->get();

        return response()->json($product);
    }

    public function getProduct($idproduct, $idbranch)
    {

        $product = BranchsProduct::where([['product_id',$idproduct], ['branch_office_id', $idbranch]])
                    ->with('product')->first();

        return response()->json($product);
    }

}
