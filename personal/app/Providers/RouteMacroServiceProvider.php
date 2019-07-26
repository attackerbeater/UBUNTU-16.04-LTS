<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class RouteMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      echo __METHOD__;
      echo '<br/>';
        // response::macro('personal', function($model){
        //     return Response::json([$model]);
        // });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
      echo __METHOD__;
      echo '<br/>';
    }
}
