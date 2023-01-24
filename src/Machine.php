<?php

namespace Deligoez\EventMachine;

class Machine
{
    public function __construct(
        public string $name,
    ) {
    }

    private const DEFAULT_NAME = '(machine)';

    public static function define(array $definition): self
    {
        return new self(
            name: $definition['name'] ?? self::DEFAULT_NAME,
        );
    }
}
