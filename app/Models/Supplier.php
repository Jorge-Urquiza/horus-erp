<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Supplier extends Model
{
    use LogsActivity;

    //protected $fillable = ['name','address','telephone','type','email' ];
}
