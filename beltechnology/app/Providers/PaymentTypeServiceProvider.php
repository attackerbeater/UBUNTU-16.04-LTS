<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PaymentTypeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
          $this->app->bind('App\libs\Payment\PaymentInterface', 'App\libs\Payment\PaymentType');
    }
}
