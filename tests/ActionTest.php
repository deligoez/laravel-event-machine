<?php

use Deligoez\EventMachine\Action;
use Spatie\LaravelData\DataCollection;

test('create an action')
    ->expect(fn() => Action::from(['name' => 'action_name']))
    ->toBeInstanceOf(Action::class)
    ->name->toBe('action_name');

test('create multiple actions')
    ->expect(fn() => Action::collection([
        ['name' => 'action_name_1'],
        ['name' => 'action_name_2'],
    ]))
    ->toBeInstanceOf(DataCollection::class)
    ->each->toBeInstanceOf(Action::class);