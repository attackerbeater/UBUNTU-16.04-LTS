<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BeltechEmailServiceProvider extends ServiceProvider
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
        $this->app->bind('App\libs\Email\InterfaceEmail', 'App\libs\Email\EmailHandler');
    }
}
