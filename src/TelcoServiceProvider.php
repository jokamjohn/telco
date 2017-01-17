<?php

namespace Kagga\Telco;

use Illuminate\Support\ServiceProvider;

class TelcoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/telco.php' => config_path('telco.php')], 'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'telco');

        $this->publishes([__DIR__ . '/views', resource_path('views/vendor/telco')], 'views');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Kagga\Telco\AfricasTalkingGateway', function () {

            $username = config('telco.username');

            $api_key = config('telco.api_key');

            return new AfricasTalkingGateway($username, $api_key);
        });

        $this->app->bind('Kagga\Telco\contracts\TelcoInterface', 'Kagga\Telco\concrete\Telco');


        $this->app->bind('telco', 'Kagga\Telco\contracts\TelcoInterface');
    }
}
