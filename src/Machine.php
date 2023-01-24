<?php

namespace Deligoez\EventMachine;

class Machine
{
    public function __construct(
        public string $name,
        public string $id,
    ) {
    }

    private const DEFAULT_NAME = '(machine)';

    public static function define(array $definition): self
    {
        return new self(
            name: $definition['name'] ?? self::DEFAULT_NAME,
            id: $definition['id'] ?? uniqid(prefix: false, more_entropy: true),
        );
    }
}
