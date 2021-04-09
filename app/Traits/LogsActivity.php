<?php

namespace App\Traits;

use App\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity as BaseTrait;

trait LogsActivity
{
    use BaseTrait, LogAttributes;

    protected static $logAttributes = ['*'];

    protected static $models = [
        'Category' => 'Categoria'
    ];

    protected static $actions = [
        'created' => 'creación',
        'updated' => 'modificación',
        'deleted' => 'eliminación',
    ];

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->action = $this->getEventDescription($eventName);
        $activity->target = $this->getModelName();
        $activity->user = $this->getCauserDescription();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return 'Datos: ' . $this->attributesToDescription();
    }

    private function getEventDescription($eventName)
    {
        return self::$actions[$eventName];
    }

    private function getCauserDescription()
    {
        if (! auth('web')->check()) {
            return 'API';
        }

        /** @var Usuario $user */
        $user = auth('web')->user();

        return "{$user->nombre} (ID:{$user->id})";
    }

    private function getModelName()
    {
        $className = class_basename($this);

        return self::$models[$className] ?? $className;
    }
}
