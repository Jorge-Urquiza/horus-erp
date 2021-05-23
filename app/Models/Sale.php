<?php

namespace App\Models;

use App\Support\NumberToLetter;
use App\Support\NumeroALetras;
use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Sale extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_At'
    ];

    protected $casts = [
        'total_amount' => 'float',
        'subtotal' => 'float',
        'discount' => 'float',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i:s');
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class, 'sale_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id')
        ->withDefault([
            'name' => 'Empty'
        ]);;
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id')
        ->withDefault([
            'name' => 'Empty'
        ]);;;
    }

    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class, 'branch_office_id')
        ->withDefault([
            'name' => 'Empty'
        ]);;;
    }

   /**
     * Literal value name of sale amount
     *
     * @return string
     */
    public function getTotalLiteralAttribute()
    {
        $amount = $this->total_amount;

       return NumberToLetter::convert($amount, $moneda = null, $centimos = null, $forzarCentimos = true);
    }

    /**
     * Suffix value (00/100) of sale amount
     *
     * @return string
     */
    public function getSuffixAttribute()
    {
        $amount = ($this->total_amount);

        $total = explode('.', $amount);

        // Si existe un valor en la posicion [1]
        $suffix = isset($total[1]) ? $total[1] : 0 ;

        if ($suffix < 10 && substr($suffix, 0, 1) != 0) {
            return $suffix . '0/100';
        }

        if ($suffix == 0) {
            return '00/100';
        }

        return $suffix . '/100';
    }
}
