<?php

namespace App\DataTables;

use App\Models\BranchOffice;
use Illuminate\Database\Query\Builder;

class BranchOfficesTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return BranchOffice::query()->select(['id', 'name', 'city', 'address', 'telephone']);
    }
}
