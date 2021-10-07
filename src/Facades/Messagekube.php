<?php

namespace Usdidev\McaKubemqPhp\Facades;

use Illuminate\Support\Facades\Facade;

class Messagekube extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'kubemq-message';
    }
}
