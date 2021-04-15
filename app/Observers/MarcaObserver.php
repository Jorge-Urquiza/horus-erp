<?php

namespace App\Observers;

use App\Models\Brand;

class MarcaObserver
{
    /**
     * Handle the Marca "created" event.
     *
     * @param  \App\Models\Marca  $marca
     * @return void
     */
    public function created(Brand $marca)
    {
        //
    }

    /**
     * Handle the Brand "updated" event.
     *
     * @param  \App\Models\Brand  $marca
     * @return void
     */
    public function updated(Brand $marca)
    {
        //
    }

    /**
     * Handle the Brand "deleted" event.
     *
     * @param  \App\Models\Brand  $marca
     * @return void
     */
    public function deleted(Brand $marca)
    {
        //
    }

    /**
     * Handle the Brand "restored" event.
     *
     * @param  \App\Models\Brand  $marca
     * @return void
     */
    public function restored(Brand $marca)
    {
        //
    }

    /**
     * Handle the Brand "force deleted" event.
     *
     * @param  \App\Models\Brand  $marca
     * @return void
     */
    public function forceDeleted(Brand $marca)
    {
        //
    }
}
