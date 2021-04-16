<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity as BaseTrait;

trait LogsActivity
{
    use BaseTrait, LogAttributes;

    protected static $logAttributes = ['*'];

    protected static $models = [
        'Category' => 'Categoria',
        'Product' => 'Producto',
        'Supllier' => 'Proveedor',
        'User' => 'Usuario',        
        'Brand' => 'Marca',
        'MeasurementsUnits' => 'Unidad Medida',
        'IncomeNote' => 'Nota Ingreso',
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
    //  return auth('web')->user()->name;
        $user = Auth::user();

        if($user){
            return $user->name;
        }
        return "User unknown";
        //return auth()->user()->getFullName() . ' - ID:' .auth()->user()->id ;
    }

    private function getModelName()
    {
        $className = class_basename($this);

        return self::$models[$className] ?? $className;
    }
}
