<?php

namespace App\DataTables;

use App\Models\Supplier;
use Illuminate\Database\Query\Builder;

class SuppliersTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return Supplier::query()->select(['id', 'name','email','telephone']);
    }
}
