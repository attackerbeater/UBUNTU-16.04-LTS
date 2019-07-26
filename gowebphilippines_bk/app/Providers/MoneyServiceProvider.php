<?php

namespace App;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

class MoneyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton('IntlMoneyFormatter', function () {
            return new IntlMoneyFormatter(
                new NumberFormatter('nl_NL', NumberFormatter::CURRENCY),
                new ISOCurrencies
            );
        });

        Blade::directive('CentsToEuros', function ($cents) {
            return "<?php echo app('IntlMoneyFormatter')->format(\Money\Money::EUR($cents)); ?>";
        });
    }
}