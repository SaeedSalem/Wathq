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
        
    }
}
