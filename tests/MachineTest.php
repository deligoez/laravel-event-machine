<?php

use Deligoez\EventMachine\State;
use Deligoez\EventMachine\Machine;

test('a machine is an instance of State::class', function (): void {
    $machine = Machine::define();

    expect($machine)->toBeInstanceOf(State::class);
});

test('a machine has a name', function (): void {
    $machine = Machine::define([
        'name' => 'traffic_lights_machine',
    ]);

    expect($machine)->name->toBe('traffic_lights_machine');
});

test('a machine without name has a default name', function (): void {
    $machine = Machine::define([]);

    expect($machine)->name->toBe(State::DEFAULT_NAME);
});

test('a machine has an id', function (): void {
    $machine = Machine::define([
        'id' => '1',
    ]);

    expect($machine)->id->toBe('1');
});

test('a machine has a machine', function (): void {
    $machine = Machine::define([]);

    expect($machine->machine)->toBeInstanceOf(State::class);
});

test('a machine without id has a default id', function (): void {
    $machine = Machine::define([]);

    expect($machine)->id
        ->toBeString()
        ->not->toBeEmpty();
});

test('a machine has a value', function (): void {
    $machine = Machine::define([
        'name'  => 'traffic_lights_machine',
        'value' => 'red',
    ]);

    expect($machine->value)->toBe('red');
});

test('a machine has a version', function (): void {
    $machine = Machine::define([
        'version' => 2,
    ]);

    expect($machine)->version->toBe(2);
});

test('a machine has a default version', function (): void {
    $machine = Machine::define([]);

    expect($machine)->version->toBe(1);
});

test('a machine can have a description', function (): void {
    $machineDefinition = [
        'description' => 'A Traffic Lights Machine',
    ];

    $machine = Machine::define($machineDefinition);

    expect($machine)->description->toBe('A Traffic Lights Machine');
});
