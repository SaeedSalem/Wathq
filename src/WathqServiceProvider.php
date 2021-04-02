<?php

namespace SaeedSalem\Wathq;

use Illuminate\Support\ServiceProvider;
use SaeedSalem\Wathq\Repositories\MinistryOfCommerce\CommercialRegistration;
use SaeedSalem\Wathq\Repositories\MinistryOfCommerce\CommercialRegistrationInterface;

class WathqServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommercialRegistrationInterface::class, CommercialRegistration::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
            __DIR__.'/../database/factories/' => database_path('factories'),
            __DIR__.'/../database/seeders/' => database_path('seeders'),
            __DIR__.'/../Models/' => app_path('Models'),
        ]);
    }
}
