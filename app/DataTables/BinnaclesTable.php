<?php

namespace App\DataTables;

use App\Models\Activity;

class BinnaclesTable extends Datatable
{
    public function query()
    {
        return Activity::all();
    }
}
