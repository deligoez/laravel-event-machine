<?php

use Deligoez\EventMachine\Machine;
use Deligoez\EventMachine\State;

test('a machine can have an initial state', function () {
    $machine = Machine::define([
        'name'          => 'traffic_lights_machine',
        'initial_state' => 'red',
    ]);

    expect($machine)->initialState->toBeInstanceOf(State::class);
});
