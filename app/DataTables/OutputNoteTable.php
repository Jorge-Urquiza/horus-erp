<?php

namespace App\DataTables;

use App\Models\OutputNote;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class OutputNoteTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        return OutputNote::query()->select(['output_notes.id','output_notes.date', DB::raw( 'CONCAT (users.name," " ,users.last_name) as personal'),'branch_offices.name as sucursal'])
            ->leftJoin('branch_offices','branch_offices.id','=','output_notes.branch_office_id')
            ->leftJoin('users','users.id','=','output_notes.user_id')
            ->orderBy('output_notes.id', 'desc');
    }
}
