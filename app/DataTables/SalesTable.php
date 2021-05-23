<?php

namespace App\DataTables;

use App\Models\Sale;
use Illuminate\Database\Query\Builder;

class SalesTable extends DataTable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    public function query()
    {
        /*$user = auth()->user();

        if($user->getRoleNames()->first() === 'Admin'){
            return Sale::where()with('customer', 'seller', 'branchOffice')->get();
        }
        */
        return Sale::with('customer', 'seller', 'branchOffice')->get();
    }
}
