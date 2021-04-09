<?php

namespace App\DataTables;

use App\Models\Producto;
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
        return Producto::query()->select(['id', 'nombre' ]);
    }
}
