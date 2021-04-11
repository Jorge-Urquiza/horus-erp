<?php

namespace App\DataTables;

use Spatie\Activitylog\Models\Activity;


class BinnaclesTable extends Datatable
{
    public function query()
    {
        return Activity::all();
    }
}
