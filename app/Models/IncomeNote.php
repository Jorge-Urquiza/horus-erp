<?php

namespace App\Models;

use App\Traits\LogsActivity;

class IncomeNote extends Model
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
}
