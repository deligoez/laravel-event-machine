<?php

namespace Deligoez\EventMachine;

abstract class MachineDefinition
{
    abstract protected static function define(): array;

    public static function getDefinition(): array
    {
        return static::define();
    }

    public static function start(): Machine
    {
        $machine =  Machine::from(static::define());

        // TODO: Register events

        return $machine;
    }
}
