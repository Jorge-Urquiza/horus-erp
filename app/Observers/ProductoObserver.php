<?php

namespace App\Observers;

use App\Models\Product;
use App\Notifications\NewSaleNotification;
use Illuminate\Support\Facades\Notification;

class ProductoObserver
{
    /**
     * Handle the Producto "created" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function created(BranchProduct $producto)
    {
        Notification::route('slack', env('SLACK_HOOK'))
            ->notify(new NewSaleNotification());

    //   \Log::info('asdasdasdasdasd');
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $producto
     * @return void
     */
    public function updated(Product $producto)
    {

    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $producto
     * @return void
     */
    public function deleted(Product $producto)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $producto
     * @return void
     */
    public function restored(Product $producto)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $producto
     * @return void
     */
    public function forceDeleted(Product $producto)
    {
        //
    }
}
