<?php

namespace Deligoez\EventMachine;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class Transition extends Data
{
    public function __construct(
        public string $source_state,
        public string $target_state,
        public string $event,

        #[DataCollectionOf(Action::class)]
        public DataCollection|Optional $actions,
    ) {
        self::validate($this);
    }
}
