<?php

namespace App\Models;

use App\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
