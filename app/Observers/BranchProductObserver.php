<?php

namespace App\Observers;

use App\Models\BranchsProduct;
use App\Models\User;
use App\Notifications\pruebaNotification;
use App\Notifications\StockNotification;
use Illuminate\Support\Facades\Notification;

class BranchProductObserver
{
    /**
     * Handle the BranchsProduct "created" event.
     *
     * @param  \App\Models\BranchsProduct  $branchsProduct
     * @return void
     */
    public function created(BranchsProduct $branchsProduct)
    {
        //
    }

    /**
     * Handle the BranchsProduct "updated" event.
     *
     * @param  \App\Models\BranchsProduct  $branchsProduct
     * @return void
     */
    public function updated(BranchsProduct $branchsProduct)
    {
        $mensaje = "";
        /*
        if($branchsProduct->current_stock > $branchsProduct->maximum_stock)
        {
            $mensaje= "El producto ".$branchsProduct->product->name." en la sucursal ".$branchsProduct->branch_office->name
                      ." supero su stock maximo";
            /*Notification::route('slack',
            env('SLACK_STOCK_WEEBHOOK'))
            ->notify(new StockNotification($mensaje));*/
         //   User::first()->notify( new StockNotification($mensaje));
       // }
        /*
        if($branchsProduct->current_stock < $branchsProduct->minimum_stock)
        {
            $mensaje= "El producto ".$branchsProduct->product->name." en la sucursal ".$branchsProduct->branch_office->name
                      ." es menor a su stock minimo";
            /*Notification::route('slack',
            env('SLACK_STOCK_WEEBHOOK'))
            ->notify(new StockNotification($mensaje));*/
           // User::first()->notify( new StockNotification($mensaje));
        //}

    }

    /**
     * Handle the BranchsProduct "deleted" event.
     *
     * @param  \App\Models\BranchsProduct  $branchsProduct
     * @return void
     */
    public function deleted(BranchsProduct $branchsProduct)
    {
        //
    }

    /**
     * Handle the BranchsProduct "restored" event.
     *
     * @param  \App\Models\BranchsProduct  $branchsProduct
     * @return void
     */
    public function restored(BranchsProduct $branchsProduct)
    {
        //
    }

    /**
     * Handle the BranchsProduct "force deleted" event.
     *
     * @param  \App\Models\BranchsProduct  $branchsProduct
     * @return void
     */
    public function forceDeleted(BranchsProduct $branchsProduct)
    {
        //
    }
}
