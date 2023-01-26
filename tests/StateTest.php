<?php

use Deligoez\EventMachine\Machine;
use Deligoez\EventMachine\State;

test('a machine can have states', function ($definition) {
    $machine = Machine::define($definition);

    expect($machine)
        ->toBeInstanceOf(State::class)
        ->machine->toBe($machine)
        ->parent->toBeNull()
        ->states->toBeArray()
                ->toHaveCount(3);

    foreach ($machine->states as $stateName => $stateInstance) {
        expect($stateInstance)
            ->toBeInstanceOf(State::class)
            ->name->toBe($stateName)
            ->machine->toBe($machine)
            ->parent->toBe($machine)
            ->states->toBeNull();
    }
})->with('states');

dataset('states', [
    'with state implementation'            => [
        [
            'name'          => 'traffic_lights_machine',
            'initial_state' => 'red',
            'states'        => [
                'red'    => [],
                'yellow' => [],
                'green'  => [],
            ],
        ],
    ],
    'without state implementation'         => [
        [
            'name'          => 'traffic_lights_machine',
            'initial_state' => 'red',
            'states'        => [
                'red',
                'yellow',
                'green',
            ],
        ],
    ],
    'with or without state implementation' => [
        [
            'name'          => 'traffic_lights_machine',
            'initial_state' => 'red',
            'states'        => [
                'red',
                'yellow' => [],
                'green',
            ],
        ],
    ],
]);
