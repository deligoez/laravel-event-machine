<?php

use Deligoez\EventMachine\State;
use Deligoez\EventMachine\Machine;

test('a machine can have an initial state', function (): void {
    $machine = Machine::define([
        'name'          => 'traffic_lights_machine',
        'initial_state' => 'red',
    ]);

    expect($machine)
        ->initialState->toBeInstanceOf(State::class)
        ->initialState->value->toBe('red');
});

test('a machine initial state has a parent as machine itself', function (): void {
    $machine = Machine::define([
        'name'          => 'traffic_lights_machine',
        'initial_state' => 'red',
    ]);

    expect($machine)
        ->initialState->parent
        ->toBeInstanceOf(State::class)
        ->toBe($machine);
});
