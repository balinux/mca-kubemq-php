<?php

namespace Usdidev\McaKubemqPhp;

use Illuminate\Support\ServiceProvider;
use Usdidev\McaKubemqPhp\Services\Messagekube;

class McaKubemqPhpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('mcakubemqphp', function () {
        //     return new McaKubemqPhp();
        // });

        $this->app->bind('kubemq-message', function () {
            return new Messagekube();
        });

        // $this->app->singleton('mcakubemqphp', function($app){
        //     return new McaKubemqPhp();
        // });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/mcakubemqphp.php' => config_path('mcakubemqphp.php'),], 'config');

    }
}
