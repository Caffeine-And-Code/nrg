<?php

namespace App\Providers;

use App\Events\OrderUpdate;
use App\Listeners\SendOrderNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::calculateTaxes();

        if(!session()->has('locale')) {
            session(['locale' => 'en']);
        }

        Event::listen(
            OrderUpdate::class,
            SendOrderNotification::class
        );
    }
}
