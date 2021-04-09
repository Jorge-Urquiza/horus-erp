<?php

namespace App\DataTables;

use App\Models\Marca;
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
        return Marca::query()->select(['id', 'nombre']);
    }
}
