<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Query\Builder;

class BrandsTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return Brand::query()->select(['id', 'name']);
    }
}
