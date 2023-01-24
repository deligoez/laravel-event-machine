<?php

use Deligoez\EventMachine\Machine;

test('a machine is an instance of Machine::class', function () {
    $machineDefinition = [];

    $machine = Machine::define($machineDefinition);

    expect($machine)->toBeInstanceOf(Machine::class);
});

test('a machine has a name', function () {
    $machineName = 'a_machine_with_a_name';

    $machineDefinition = [
        'name' => $machineName,
    ];

    $machine = Machine::define($machineDefinition);

    expect($machine)->name->toBe($machineName);
});

test('a machine without name has a default name', function () {
    $machineDefinition = [];

    $machine = Machine::define($machineDefinition);

    expect($machine)->name->toBe('(machine)');
});
