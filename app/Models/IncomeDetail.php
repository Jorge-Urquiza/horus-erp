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
}
