<?php

namespace App\DataTables;

use App\Models\TransferNote;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferNoteProcessedTable extends DataTable
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
            return TransferNote::query()->select(['transfer_notes.id','transfer_notes.date', DB::raw( 'CONCAT (users.name," " ,users.last_name) as personal'),'origin.name as origen', 'destiny.name as destino'])
                ->leftJoin('branch_offices as origin','origin.id','=','transfer_notes.branch_office_origin_id')
                ->leftJoin('branch_offices as destiny','destiny.id','=','transfer_notes.branch_office_destiny_id')
                ->leftJoin('users','users.id','=','transfer_notes.user_id')
                ->where('status', 'En proceso')
                ->orderBy('transfer_notes.id', 'desc');
        }
        return TransferNote::query()->select(['transfer_notes.id','transfer_notes.date', DB::raw( 'CONCAT (users.name," " ,users.last_name) as personal'),'origin.name as origen', 'destiny.name as destino'])
                ->leftJoin('branch_offices as origin','origin.id','=','transfer_notes.branch_office_origin_id')
                ->leftJoin('branch_offices as destiny','destiny.id','=','transfer_notes.branch_office_destiny_id')
                ->leftJoin('users','users.id','=','transfer_notes.user_id')
                ->where([['origin.id','=',$user->branch_office_id], ['status','=', 'En proceso']])
                ->orderBy('transfer_notes.id', 'desc');
    }
}
