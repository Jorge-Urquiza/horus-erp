<?php

namespace App\ViewModels\IncomeNote;

use App\Models\IncomeDetail;
use App\Models\IncomeNote;
use Spatie\ViewModels\ViewModel;

class IncomeViewModel extends ViewModel
{
    public $income;

    public function __construct(IncomeNote $income)
    {
        $this->income = $income;
        $this->obtener();
    }

    public function details()
    {
        return IncomeDetail::where('income_note_id', $this->income->id)->get();
    }

    private function obtener()
    {
       return $this->income->with('branch_office', 'user')->first();
    }
}
