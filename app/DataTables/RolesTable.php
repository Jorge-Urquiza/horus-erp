<?php

namespace App\DataTables;

use Illuminate\Database\Query\Builder;
use Spatie\Permission\Models\Role;

class RolesTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return Role::query()->select(['id', 'name', 'description']);
    }
}
