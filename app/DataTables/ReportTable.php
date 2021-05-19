<?php

namespace App\DataTables;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Builder;

class ReportTable extends Datatable
{
    public function query()
    {

    /*     $initialDate = '2021-05-17';
        $endDate = '2021-05-25';
        $branchOffice = 2; */


        $initialDate = request('initial_date');
        $endDate = request('end_date');
        $branchOffice = request('branch_office_id');

        return Sale::query()
        ->when($branchOffice, function (Builder $sales) use ($branchOffice) {
            $sales->where('branch_office_id', $branchOffice);
        })
        ->when($initialDate, function (Builder $sales) use ($initialDate) {
            $sales->whereDate('date', '>=', $initialDate);
        })
        ->when($endDate, function (Builder $sales) use ($endDate) {
            $sales->whereDate('date', '<=', $endDate);
        })->with('customer', 'branchOffice', 'seller');

    }
}
