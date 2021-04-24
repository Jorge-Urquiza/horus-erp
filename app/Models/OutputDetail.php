<?php

namespace App\Models;

use App\Traits\LogsActivity;

class OutputDetail extends Model
{
    use LogsActivity;
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function remove($output_id){
        OutputDetail::where('output_note_id', $output_id)->delete();
    }
}
