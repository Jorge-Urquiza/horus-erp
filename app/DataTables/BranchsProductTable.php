<?php

namespace App\DataTables;

use App\Models\BranchsProduct;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BranchsProductTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        $user = Auth::user();
        if($user->is_admin)
        {
            return BranchsProduct::query()->select(['branchs_products.id', 'branchs_products.current_stock','products.name','branchs_products.maximum_stock','branchs_products.minimum_stock', 
            'products.local_code', 'branch_offices.name as sucursal'])
            ->leftJoin('products','products.id','=','branchs_products.product_id')
            ->leftJoin('branch_offices','branch_offices.id','=','branchs_products.branch_office_id')
            ->orderBy('branchs_products.id', 'desc');
        }

        return BranchsProduct::query()->select(['branchs_products.id','branchs_products.current_stock','products.name','branchs_products.maximum_stock','branchs_products.minimum_stock', 'products.local_code'])
            ->leftJoin('products','products.id','=','branchs_products.product_id')
            ->where('branchs_products.branch_office_id',$user->branch_office_id)
            ->orderBy('branchs_products.id', 'desc');
    }
}
