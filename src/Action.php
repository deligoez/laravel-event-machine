<?php

namespace Deligoez\EventMachine;

use Spatie\LaravelData\Data;

class Action extends Data
{
    public function __construct(
        public string $name,
    ) {
        self::validate($this);
    }
}
