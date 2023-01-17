<?php

use Deligoez\EventMachine\Action;
use Deligoez\EventMachine\Machine;
use Deligoez\EventMachine\State;
use Deligoez\EventMachine\Tests\Stubs\Machines\AuthenticationMachine;
use Deligoez\EventMachine\Transition;

test('create a machine')
    ->expect(fn() => Machine::from([
        'id'            => 'authentication_machine',
        'initial_state' => 'logged_out_state',
        'states'        => [
            [
                'name' => 'logged_out_state',
                'transitions'   => [
                    [
                        'source_state' => 'logged_out_state',
                        'target_state' => 'logged_in_state',
                        'event'        => 'login_event',
                        'actions'      => [
                            ['name' => 'login_action_1'],
                            ['name' => 'login_action_2'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'logged_in_state',
                'transitions'   => [
                    [
                        'source_state' => 'logged_in_state',
                        'target_state' => 'logged_out_state',
                        'event'        => 'logout_event',
                        'actions'      => [
                            ['name' => 'logout_action_1'],
                            ['name' => 'logout_action_2'],
                        ],
                    ],
                ],
            ],
        ],
    ]))
    ->toBeInstanceOf(Machine::class)
    ->id->toBe('authentication_machine')
    ->states->each->toBeInstanceOf(State::class);
