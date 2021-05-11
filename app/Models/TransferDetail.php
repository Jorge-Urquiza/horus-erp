<?php

namespace App\Models;

use App\Traits\LogsActivity;

class TransferDetail extends Model
{
    use LogsActivity;
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function remove($transfer_id){
        TransferDetail::where('transfer_note_id', $transfer_id)
                        ->update([
                            'is_canceled' => true
                         ]);
    }
}
