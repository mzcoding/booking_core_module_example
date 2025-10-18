<?php

namespace App\Providers;

use Booking\Services\GuideService;
use Booking\Services\HunterBookingService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GuideService::class);
        $this->app->bind(HunterBookingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
