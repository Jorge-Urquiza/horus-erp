<?php

namespace App\Observers;

use App\Models\Marca;

class MarcaObserver
{
    /**
     * Handle the Marca "created" event.
     *
     * @param  \App\Models\Marca  $marca
     * @return void
     */
    public function created(Marca $marca)
    {
        //
    }

    /**
     * Handle the Marca "updated" event.
     *
     * @param  \App\Models\Marca  $marca
     * @return void
     */
    public function updated(Marca $marca)
    {
        //
    }

    /**
     * Handle the Marca "deleted" event.
     *
     * @param  \App\Models\Marca  $marca
     * @return void
     */
    public function deleted(Marca $marca)
    {
        //
    }

    /**
     * Handle the Marca "restored" event.
     *
     * @param  \App\Models\Marca  $marca
     * @return void
     */
    public function restored(Marca $marca)
    {
        //
    }

    /**
     * Handle the Marca "force deleted" event.
     *
     * @param  \App\Models\Marca  $marca
     * @return void
     */
    public function forceDeleted(Marca $marca)
    {
        //
    }
}
