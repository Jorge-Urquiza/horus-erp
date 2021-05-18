<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Query\Builder;

class ProductsTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        
        return Product::with('category')->get();
        /*return Product::query()->select(['products.id','products.local_code', 'products.name', 'products.price','categories.name as category'])
            ->leftJoin('categories','categories.id','=','products.category_id')
            ->orderBy('products.id', 'desc');*/
    }
}
