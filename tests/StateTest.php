<?php

use Deligoez\EventMachine\Machine;
use Deligoez\EventMachine\State;

test('a machine can have states', function () {
    $machine = Machine::define([
        'name'          => 'traffic_lights_machine',
        'initial_state' => 'red',
        'states'        => [
            'red'    => [],
            'yellow' => [],
            'green'  => [],
        ],
    ]);
    expect($machine)
        ->toBeInstanceOf(State::class)
        ->states->toBeArray();

    foreach ($machine->states as $stateName => $stateInstance) {
        expect($stateInstance)
            ->toBeInstanceOf(State::class)
            ->name->toBe($stateName)
            ->parent->toBe($machine);
    }
});
