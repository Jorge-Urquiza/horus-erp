<?php

namespace App\Models;

use App\Traits\LogsActivity;

class Customer extends Model
{
    use LogsActivity;

    public function getFullNameAttribute(): string
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->last_name);
    }
}
