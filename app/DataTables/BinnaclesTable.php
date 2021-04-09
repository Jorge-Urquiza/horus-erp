<?php

namespace App\DataTables;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder;

class BinnaclesTable extends Datatable
{
    public function query()
    {
        return Activity::query()
            ->select([
                'id', 'action', 'target', 'user', 'description', 'created_at'
            ]);
    }
}
