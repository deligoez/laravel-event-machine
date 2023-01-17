<?php

namespace Deligoez\EventMachine;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Machine extends Data
{
    public function __construct(
        public string $id,

        public string $initial_state,

        #[DataCollectionOf(State::class)]
        public DataCollection $states,
    ) {
        self::validate($this);
    }
}
