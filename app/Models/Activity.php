<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as Model;

/**
 * Class Activity
 *
 * @property string|null $action
 * @property string|null $target
 * @property string|null $user
 */

class Activity extends Model
{

    public function __construct(array $attributes = [])
    {
        parent::__construct([
            'user' => $this->userForActivity()
        ]);
    }

    protected function userForActivity()
    {
        return auth()->user()->name. ' - iD:' .auth()->user()->id ;
       /*
        $user = auth('web')->user();

        return "{$user->name} (ID:{$user->id})";
        */
    }
}
