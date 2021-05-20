<?php

namespace App\DataTables;

use App\Models\Activity;
use Illuminate\Database\Query\Builder;

class BinnaclesTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
    */
    public function query()
    {
        return Activity::all();
    }
}
