<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Session;

class UsersRolTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        $rol = Session::get('key');

        return User::role($rol->name)->with('branchOffice');
    }
}
