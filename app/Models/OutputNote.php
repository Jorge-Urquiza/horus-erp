<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutputNote extends Model
{
    use LogsActivity;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function branch_office()
    {
        return $this->belongsTo(BranchOffice::class, 'branch_office_id');
    }

    public function incomeDetails()
    {
        return $this->hasMany(OutputDetail::class, 'output_note_id');
    }

    public static function registrar(Request $request)
    {
        $mytime = Carbon::now('America/La_paz');
        $fecha = $mytime->toDateString();
        $user = Auth::user();
        $request->request->add(['date' => $fecha]);
        $request->request->add(['user_id' => $user->id]);
        
        return OutputNote::create($request->post());
    }
}
