<?php

use Deligoez\EventMachine\Machine;
use Deligoez\EventMachine\State;

test('a machine is an instance of Machine::class', function () {
    $machineDefinition = [];

    $machine = Machine::define($machineDefinition);

    expect($machine)->toBeInstanceOf(State::class);
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

test('a machine has a machine', function () {
    $machineDefinition = [];

    $machine = Machine::define($machineDefinition);

    expect($machine->machine)->toBeInstanceOf(State::class);
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

test('a machine can have a description', function () {
    $description = 'sample description';

    $machineDefinition = [
        'description' => $description,
    ];

    $machine = Machine::define($machineDefinition);

    expect($machine)->description->toBe($description);
});

test('a machine can have an initial state', function () {
    $initialState = 'init';

    $machineDefinition = [
        'initial_state' => $initialState,
    ];

    $machine = Machine::define($machineDefinition);

    expect($machine)->initialState->toBe($initialState);
});
