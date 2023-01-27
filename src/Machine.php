<?php

namespace Deligoez\EventMachine;

class Machine
{
    private function __construct(
    ) {
    }

    public static function define(?array $definition = null): State
    {
        return new State(
            name: $definition['name'] ?? null,
            id: $definition['id'] ?? null,
            description: $definition['description'] ?? null,
            version: $definition['version'] ?? null,
            value: $definition['value'] ?? null,
            parent: $definition['parent'] ?? null,
            initialState: $definition['initial_state'] ?? null,
            states: $definition['states'] ?? null,
        );
    }

    public function start(): State
    {
        // TODO: Register events
        // TODO: Implement start() method.

        return new State();
    }
}
