<?php

use Deligoez\EventMachine\Machine;
use Deligoez\EventMachine\State;

test('a machine is an instance of State::class', function () {
    $machine = Machine::define();

    expect($machine)->toBeInstanceOf(State::class);
});

test('a machine has a name', function () {
    $machine = Machine::define([
        'name' => 'traffic_lights_machine',
    ]);

    expect($machine)->name->toBe('traffic_lights_machine');
});

test('a machine without name has a default name', function () {
    $machine = Machine::define([]);

    expect($machine)->name->toBe(State::DEFAULT_NAME);
});

test('a machine has an id', function () {
    $machine = Machine::define([
        'id' => '1',
    ]);

    expect($machine)->id->toBe('1');
});

test('a machine has a machine', function () {
    $machine = Machine::define([]);

    expect($machine->machine)->toBeInstanceOf(State::class);
});

test('a machine without id has a default id', function () {
    $machine = Machine::define([]);

    expect($machine)->id
        ->toBeString()
        ->not->toBeEmpty();
});

test('a machine can have a description', function () {
    $machineDefinition = [
        'description' => 'A Traffic Lights Machine',
    ];

    $machine = Machine::define($machineDefinition);

    expect($machine)->description->toBe('A Traffic Lights Machine');
});
