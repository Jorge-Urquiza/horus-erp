<?php

namespace App\Models;

use App\Traits\LogsActivity;

class IncomeDetail extends Model
{
    use LogsActivity;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function remove($income_id){
        IncomeDetail::where('income_note_id', $income_id)->delete();
    }
}
