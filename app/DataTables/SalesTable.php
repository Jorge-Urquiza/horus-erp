<?php

namespace App\DataTables;

use App\Models\Sale;
use Illuminate\Database\Query\Builder;

class SalesTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return Sale::with('customer', 'seller', 'branchOffice')->get();
    }
}
