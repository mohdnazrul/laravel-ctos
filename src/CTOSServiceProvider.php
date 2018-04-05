<?php

namespace MohdNazrul\CTOSLaravel;

use Illuminate\Support\ServiceProvider;

class CTOSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/ctos.php' => config_path('ctos.php'),
        ], 'ctos');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ctos.php','ctos');

        $this->app->singleton('CTOSService', function ($app){
            $config     =   $app->make('config');
            $username   =   $config->get('ctos.username');
            $password   =   $config->get('ctos.password');
            $serviceURL =   $config->get('ctos.serviceUrl');

            return new CTOSService($serviceURL,$username, $password) ;

        });
    }

    public function provides() {
        return ['CTOSApi'];
    }
}
