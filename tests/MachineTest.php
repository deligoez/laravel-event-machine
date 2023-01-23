<?php

use Deligoez\EventMachine\Machine;
use Deligoez\EventMachine\State;
use Deligoez\EventMachine\Tests\Stubs\Machines\AuthenticationMachine;
use Deligoez\EventMachine\Tests\Stubs\Machines\ToggleMachine;

test('create a machine')
    ->expect(fn() => Machine::from(AuthenticationMachine::getDefinition()))
    ->toBeInstanceOf(Machine::class)
    ->name->toBe('authentication_machine')
    ->states->each->toBeInstanceOf(State::class);

test('create another machine')
    ->expect(fn() => Machine::from(ToggleMachine::getDefinition()))
    ->toBeInstanceOf(Machine::class)
    ->name->toBe('toggle_machine')
    ->states->each->toBeInstanceOf(State::class);
