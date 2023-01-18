<?php

namespace Deligoez\EventMachine\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Deligoez\EventMachine\Machine
 */
class EventMachine extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Deligoez\EventMachine\Machine::class;
    }
}
