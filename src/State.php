<?php

namespace Deligoez\EventMachine;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class State extends Data
{
    public function __construct(
        public string $name,

        #[DataCollectionOf(Transition::class)]
        public DataCollection $transitions,
    )
    {
        self::validate($this);
    }
}
