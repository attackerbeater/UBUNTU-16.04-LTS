<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::directive('InputTextBox', function($field){
            return "<?php echo \App\InputBox::text($field); ?>";
        });

        \Blade::directive('ButtonSubmit', function($field){
            return "<?php echo \App\ButtonSubmit::button($field); ?>";
        });

        \Blade::directive('Header', function($field){
            return "<?php echo \App\Header::header($field); ?>";
        });

        // \View::composer('*', 'App\LeveranciersGetByIdComposer');
        \View::creator('admin/leveranciers/create', 'App\LeveranciersGetByIdComposer');
    }
}
