<?php

namespace App\ViewModels\Sale;

use Spatie\ViewModels\ViewModel;
use App\Models\BranchOffice;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SaleCreateViewModel extends ViewModel
{

    public $seller;

    public function __construct()
    {
        $this->seller = auth()->user();
    }

    public function products()
    {
        return Product::orderBy('id', 'DESC')->pluck('name','id');
    }

    public function customers() : array
    {
        return Customer::select(DB::raw("CONCAT(name, ' ', last_name) AS full"), "id")
            ->pluck('full', 'id')->toArray();
    }

    public function branchOffice() : BranchOffice
    {
        return BranchOffice::find($this->seller->branch_office_id);
    }

}
