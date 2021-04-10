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
        return Product::query()->select(['id', 'name' ]);
    }
}
