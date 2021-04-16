<?php

namespace App\DataTables;

use App\Models\IncomeNote;
use Illuminate\Database\Query\Builder;

class IncomeNoteTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return IncomeNote::query()->select(['income_notes.id','income_notes.fecha', 'users.name', 'users.last_name','branch_offices.name as sucursal'])
            ->leftJoin('branch_offices','branch_offices.id','=','income_notes.branch_office_id')
            ->leftJoin('users','users.id','=','income_notes.user_id')
            ->orderBy('income_notes.id', 'desc');
    }
}
