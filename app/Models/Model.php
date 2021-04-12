<?php
namespace App\Models;


use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model as Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @property-read  int $id
 * @property-read  Carbon $created_at
 * @property-read  Carbon $updated_at
 */
class Model extends Base
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];
    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
