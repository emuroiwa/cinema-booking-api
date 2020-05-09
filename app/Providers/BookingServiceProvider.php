<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CinemaServices\BookingService;

class BookingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton(BookingService::class, function(){
            return new BookingService;
        });
    }
}
