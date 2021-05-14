<?php

namespace App\DataTables;

use App\Models\IncomeNote;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeNoteEnteredTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        $user = Auth::user();
        if($user->is_admin)
        {
            return IncomeNote::query()->select(['income_notes.id','income_notes.date', DB::raw( 'CONCAT (users.name," " ,users.last_name) as personal'),'branch_offices.name as sucursal'])
                ->leftJoin('branch_offices','branch_offices.id','=','income_notes.branch_office_id')
                ->leftJoin('users','users.id','=','income_notes.user_id')
                ->where('status', 'Ingresado')
                ->orderBy('income_notes.id', 'desc');
        }
        return IncomeNote::query()->select(['income_notes.id','income_notes.date', DB::raw( 'CONCAT (users.name," " ,users.last_name) as personal'),'branch_offices.name as sucursal'])
                ->leftJoin('branch_offices','branch_offices.id','=','income_notes.branch_office_id')
                ->leftJoin('users','users.id','=','income_notes.user_id')
                ->where([['branch_offices.id', '=',$user->branch_office_id], ['status','=', 'Ingresado']])
                ->orderBy('income_notes.id', 'desc')
                ->onlyTrashed();
    }
}
