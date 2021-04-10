<?php

namespace App\DataTables;

use App\Models\Customer;
use Illuminate\Database\Query\Builder;

class CustomerTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return Customer::query()->select(['id', 'name',]);
    }
}
