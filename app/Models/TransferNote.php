<?php

namespace App\Models;

use App\Support\NumberToLetter;
use App\Traits\LogsActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferNote extends Model
{
    use LogsActivity;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function origin_branch_office()
    {
        return $this->belongsTo(BranchOffice::class, 'branch_office_origin_id');
    }

    public function destiny_branch_office()
    {
        return $this->belongsTo(BranchOffice::class, 'branch_office_destiny_id');
    }

    public function transferDetails()
    {
        return $this->hasMany(TransferDetail::class, 'transfer_note_id');
    }

    public static function registrar(Request $request)
    {
        $mytime = Carbon::now('America/La_paz');
        $fecha = $mytime->toDateString();
        $user = Auth::user();
        $request->request->add(['date' => $fecha]);
        $request->request->add(['user_id' => $user->id]);
        
        return TransferNote::create($request->post());
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
