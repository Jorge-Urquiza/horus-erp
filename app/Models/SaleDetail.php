<?php

namespace App\Models;

use App\Traits\LogsActivity;

class SaleDetail extends Model
{
    use LogsActivity;

    protected $casts = [
        'discount' => 'float',
        'total' => 'float',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
