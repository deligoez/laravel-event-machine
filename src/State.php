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

    public static function fromArray(array $data): self
    {
        foreach ($data['transitions'] as $key => $transition) {
            $data['transitions'][$key]['source_state'] = $data['name'];
        }

        return new self(
            name: $data['name'],
            transitions: Transition::collection($data['transitions'])
        );
    }
}
