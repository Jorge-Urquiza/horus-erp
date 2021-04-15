<?php

namespace App\DataTables;

use App\Models\MeasurementsUnits;
use Illuminate\Database\Query\Builder;

class UnitsTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return MeasurementsUnits::query()->select(['id', 'name','abbreviation']);
    }
}
