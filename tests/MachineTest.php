<?php

use Deligoez\EventMachine\Machine;

test('create a machine', function () {
    $machineDefinition = [];

    $machine = Machine::from($machineDefinition);

    expect($machine)->toBeInstanceOf(Machine::class);
});
