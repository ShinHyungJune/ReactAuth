<?php

namespace hyungjune\ReactAuth\Facades;

use Illuminate\Support\Facades\Facade;

class ReactAuth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'reactauth';
    }
}
