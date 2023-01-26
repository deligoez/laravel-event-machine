<?php

use Deligoez\EventMachine\State;
use Deligoez\EventMachine\Machine;

test('a useless machine')
    ->with('useless_machines')
    ->expect(Machine::define())
    ->toBeInstanceOf(State::class)
    ->machine->toBeInstanceOf(State::class)
    ->name->toBe(State::DEFAULT_NAME)
    ->value->toBe(State::DEFAULT_NAME)
    ->id->not()->toBeNull()
    ->description->toBeNull()
    ->parent->toBeNull()
    ->initialState->toBeNull()
    ->states->toBeNull();

dataset('useless_machines', [
    'no definition'     => [
        //
    ],
    'empty definition'  => [
        [],
    ],
    'empty name'        => [
        [
            'name' => '',
        ],
    ],
    'empty id'          => [
        [
            'id' => '',
        ],
    ],
    'empty description' => [
        [
            'description' => '',
        ],
    ],
    'empty states I'    => [
        [
            'states',
        ],
    ],
    'empty states II'   => [
        [
            'states' => [],
        ],
    ],
]);
