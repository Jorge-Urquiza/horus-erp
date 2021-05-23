<?php

namespace App\Notifications;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class NewSaleNotification extends Notification
{
    use Queueable;

    private $sale;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Sale $sale)
    {
        $this->sale = $sale->with('seller', 'customer' , 'branchOffice')->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
        ->success()
        ->content(
    'Nueva Venta realizada por: ' . $this->sale->seller->full_name .
            ', en la sucursal: ' . $this->sale->branchOffice->name .
            ', Cliente ' . $this->sale->customer->full_name .
            ', Subtotal: ' . $this->sale->customer->subtotal . 'Bs. '.
            ', Descuento : ' . $this->sale->customer->discount . '% '.
            ', Total venta: ' . $this->sale->customer->total_amount . 'Bs. '
        );
    }
}
