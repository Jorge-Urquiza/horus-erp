<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as Model;

class Activity extends Model
{
   // protected $fillable = ['log_name','action','target','user','description' ];

    public function __construct(array $attributes = [])
    {
        parent::__construct([
            'user' => $this->userForActivity()
        ]);
    }

    protected function userForActivity()
    {
        if (! auth('web')->check()) {
            return 'API';
        }

        /** @var Usuario $user */
        $user = auth('web')->user();

        return "{$user->nombre} (ID:{$user->id})";
    }
}
