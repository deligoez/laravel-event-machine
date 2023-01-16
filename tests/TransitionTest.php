<?php

use Deligoez\EventMachine\Action;
use Deligoez\EventMachine\Transition;
use Spatie\LaravelData\DataCollection;

test('create a transition')
    ->expect(fn() => Transition::from([
        'source_state' => 'source_state_name',
        'target_state' => 'target_state_name',
        'event'        => 'event_name',
        'actions'      => [
            ['name' => 'action_name_1'],
            ['name' => 'action_name_2'],
        ],
    ]))
    ->toBeInstanceOf(Transition::class)
    ->source_state->toBe('source_state_name')
    ->target_state->toBe('target_state_name')
    ->event->toBe('event_name')
    ->actions->each->toBeInstanceOf(Action::class);

test('create multiple transitions')
    ->expect(fn() => Transition::collection([
        [
            'source_state' => 'source_state_name',
            'target_state' => 'target_state_name',
            'event'        => 'event_name',
            'actions'      => [
                ['name' => 'action_name_1'],
                ['name' => 'action_name_2'],
            ],
        ],
        [
            'source_state' => 'source_state_name',
            'target_state' => 'target_state_name',
            'event'        => 'event_name',
            'actions'      => [
                ['name' => 'action_name_1'],
                ['name' => 'action_name_2'],
            ],
        ],
    ]))
    ->toBeInstanceOf(DataCollection::class)
    ->each->toBeInstanceOf(Transition::class);
