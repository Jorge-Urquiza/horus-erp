<?php

namespace App\Traits;

use App\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity as BaseTrait;

trait LogsActivity
{
    use BaseTrait, LogAttributes;

    protected static $logAttributes = ['*'];

    protected static $models = [
        'Category' => 'Categorias',
        'Product' => 'Productos',
        'Supllier' => 'Proveedor',
        'User' => 'Usuario',
    ];

    protected static $actions = [
        'created' => 'Creación',
        'updated' => 'Modificación',
        'deleted' => 'Eliminación',
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
        return auth()->user()->getFullName() . ' - ID:' .auth()->user()->id ;
    }

    private function getModelName()
    {
        $className = class_basename($this);

        return self::$models[$className] ?? $className;
    }
}
