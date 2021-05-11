<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Query\Builder;

class CategoriesTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return Category::query()->select(['id', 'name', 'description']);
    }
}
