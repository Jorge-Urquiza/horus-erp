<?php

namespace App\ViewModels\OutputNote;

use App\Models\OutputDetail;
use App\Models\OutputNote;
use Spatie\ViewModels\ViewModel;

class OutputViewModel extends ViewModel
{
    public $output;

    public function __construct(OutputNote $output)
    {
        $this->output = $output;
        $this->obtener();
    }

    public function details()
    {
        return OutputDetail::where('output_note_id', $this->output->id)->get();
    }

    private function obtener()
    {
       return $this->output->with('branch_office', 'user')->first();
    }
}
