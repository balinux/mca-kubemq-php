<?php

namespace Usdidev\McaKubemqPhp;

use Illuminate\Support\ServiceProvider;
use Usdidev\McaKubemqPhp\Services\McaKubemqPhp;

class McaKubemqPhpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mcakubemqphp', function(){
            return new McaKubemqPhp();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
