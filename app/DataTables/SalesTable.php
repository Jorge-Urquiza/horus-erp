<?php

namespace App\DataTables;

use App\Models\Sale;

class SalesTable extends DataTable
{
    public function query()
    {
        return Sale::with('customer', 'seller', 'branchOffice')->get();
    }
}
