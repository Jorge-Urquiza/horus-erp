<?php

namespace App\ViewModels\TransferNote;

use App\Models\TransferDetail;
use App\Models\TransferNote;
use Spatie\ViewModels\ViewModel;

class TransferViewModel extends ViewModel
{
    public $transfer;
    public function __construct(TransferNote $transfer)
    {
        $this->transfer = $transfer;
        $this->obtener();
    }

    public function details()
    {
        return TransferDetail::where('transfer_note_id', $this->transfer->id)->get();
    }

    private function obtener()
    {
       return $this->transfer->with('origin_branch_office','destiny_branch_office', 'user')->first();
    }
}
