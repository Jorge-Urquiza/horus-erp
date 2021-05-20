<?php

namespace App\Providers;

use App\Models\BranchsProduct;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Product;
use App\Models\Sale;
use App\Observers\BranchProductObserver;
use App\Observers\ProductoObserver;
use App\Observers\SaleObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Sale::observe(SaleObserver::class);
        BranchsProduct::observe(BranchProductObserver::class);
    }
}
