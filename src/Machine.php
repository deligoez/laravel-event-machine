<?php

namespace Deligoez\EventMachine;

class Machine
{
    public function __construct(
    ) {
    }

    public static function from(array $definition): self
    {
        return new self();
    }
}
