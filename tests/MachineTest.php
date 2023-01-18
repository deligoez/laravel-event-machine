<?php

use Deligoez\EventMachine\Machine;
use Deligoez\EventMachine\State;
use Deligoez\EventMachine\Tests\Stubs\Machines\AuthenticationMachine;

test('example', function () {
    expect(true)->toBeTrue();
});

test('create a machine')
    ->expect(fn() => Machine::from(AuthenticationMachine::getDefinition()))
    ->toBeInstanceOf(Machine::class)
    ->id->toBe('authentication_machine')
    ->states->each->toBeInstanceOf(State::class);
