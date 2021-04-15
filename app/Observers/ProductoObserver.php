<?php

namespace App\Observers;

use App\Models\Product;

class ProductoObserver
{
    /**
     * Handle the Producto "created" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function created(Product $producto)
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $producto
     * @return void
     */
    public function updated(Product $producto)
    {
        if($producto->image){
            //delete image// aparte de eliminar el producto en bd, tambien dedbemos borrar en disco la imagen
            /*
                Storage::delete($producto->uuid);
            */
        }

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
