<?php

use Deligoez\EventMachine\Action;
use Deligoez\EventMachine\State;
use Deligoez\EventMachine\Transition;
use Spatie\LaravelData\DataCollection;

test('create a state')
    ->expect(fn() => State::from([
        'name'        => 'state_name',
        'transitions' => [
            [
                'source_state' => 'source_state_name',
                'target_state' => 'target_state_name',
                'event'        => 'event_name',
                'actions'      => [
                    ['name' => 'action_name_1'],
                    ['name' => 'action_name_2'],
                ],
            ],
        ],
    ]))
    ->toBeInstanceOf(State::class)
    ->name->toBe('state_name')
    ->transitions->each->toBeInstanceOf(Transition::class);

test('create multiple states')
    ->expect(fn() => State::collection([
        [
            'name'        => 'state_name',
            'transitions' => [
                [
                    'source_state' => 'source_state_name',
                    'target_state' => 'target_state_name',
                    'event'        => 'event_name',
                    'actions'      => [
                        ['name' => 'action_name_1'],
                        ['name' => 'action_name_2'],
                    ],
                ],
            ],
        ],
        [
            'name'        => 'state_name',
            'transitions' => [
                [
                    'source_state' => 'source_state_name',
                    'target_state' => 'target_state_name',
                    'event'        => 'event_name',
                    'actions'      => [
                        ['name' => 'action_name_1'],
                        ['name' => 'action_name_2'],
                    ],
                ],
            ],
        ]
    ]))
    ->toBeInstanceOf(DataCollection::class)
    ->each->toBeInstanceOf(State::class);
