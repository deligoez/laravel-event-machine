<?php

namespace Deligoez\EventMachine;

class Machine
{
    private function __construct(
    ) {
    }

    private const DEFAULT_NAME = '(machine)';

    public static function define(?array $definition = null): State
    {
        return new State(
            name: $definition['name'] ?? self::DEFAULT_NAME,
            id: $definition['id'] ?? uniqid(prefix: false, more_entropy: true),
            description: $definition['description'] ?? null,
            initialState: $definition['initial_state'] ?? null,
        );
    }
}
