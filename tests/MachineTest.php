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

test('a machine has an id', function () {
    $machineId = '1';

    $machineDefinition = [
        'name' => "simple_machine",
        'id'   => $machineId,
    ];

    $machine = Machine::define($machineDefinition);

    expect($machine)->id->toBe($machineId);
});

test('a machine without id has a default id', function () {
    $machineDefinition = [
        'name' => "simple_machine",
    ];

    $machine = Machine::define($machineDefinition);

    expect($machine)->id
        ->toBeString()
        ->not->toBeEmpty();
});
