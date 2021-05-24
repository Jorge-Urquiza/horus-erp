<?php

namespace App\Observers;

use App\Models\Sale;
use App\Notifications\NewSaleNotification;
use Illuminate\Support\Facades\Notification;

class SaleObserver
{
    /**
     * Handle the Sale "created" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function created(Sale $sale)
    {
        $message = 'Nueva Venta realizada por: ' . $sale->seller->full_name .
        ', en la sucursal: ' . $sale->branchOffice->name .
        ', Cliente ' . $sale->customer->full_name .
        ', Subtotal: ' . money($sale->subtotal) . ' Bs. '.
        ', Descuento : ' . money($sale->discount) . ' % '.
        ', Total venta: ' . money($sale->total_amount) . ' Bs. ';

       Notification::route('slack',
        config('app.slack_sale_webhook'))
        ->notify(new NewSaleNotification($message));
    }

    /**
     * Handle the Sale "updated" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function updated(Sale $sale)
    {
        //
    }

    /**
     * Handle the Sale "deleted" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function deleted(Sale $sale)
    {
        //
    }

    /**
     * Handle the Sale "restored" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function restored(Sale $sale)
    {
        //
    }

    /**
     * Handle the Sale "force deleted" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function forceDeleted(Sale $sale)
    {
        //
    }
}
