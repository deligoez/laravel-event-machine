<?php

use Deligoez\EventMachine\Action;
use Spatie\LaravelData\DataCollection;

test('create an action')
    ->expect(fn() => Action::from('action_name'))
    ->toBeInstanceOf(Action::class)
    ->name->toBe('action_name');

test('create multiple actions')
    ->expect(fn() => Action::collection([
        'action_name_1',
        'action_name_2',
    ]))
    ->toBeInstanceOf(DataCollection::class)
    ->each->toBeInstanceOf(Action::class);
