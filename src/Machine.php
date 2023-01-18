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

    public static function fromArray(array $data): self
    {
        $states = [];
        foreach ($data['states'] as $stateName => $state) {
            $transitions = [];

            foreach ($state['transitions'] as $event => $transition) {
                $transitions[] = [
                    'source_state' => $stateName,
                    'target_state' => $transition['target_state'],
                    'event'        => $event,
                    'actions'      => $transition['actions']
                ];
            }
            $states[] = [
                'name'        => $stateName,
                'transitions' => $transitions
            ];
        }

        return new self(
            id: $data['id'],
            initial_state: $data['initial_state'],
            states: State::collection($states),
        );
    }
}
