<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class Supplier extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = ['name','address','telephone','type','email' ];
}
