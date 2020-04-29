<?php

namespace victorycto\imagepreparation\Facades;

use Illuminate\Support\Facades\Facade;

class imagepreparation extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'imagepreparation';
    }
}
