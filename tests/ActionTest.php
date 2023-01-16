<?php

use Deligoez\EventMachine\Action;
use Spatie\LaravelData\DataCollection;

test('action', function () {
    $action = Action::from(['name' => 'action_name']);

    expect($action)->toBeInstanceOf(Action::class);
});

test('actions', function () {
    $actions = Action::collection([
        ['name' => 'action_name_1'],
        ['name' => 'action_name_2'],
    ]);

    expect($actions)->toBeInstanceOf(DataCollection::class);

    foreach ($actions as $action) {
        expect($action)->toBeInstanceOf(Action::class);
    }
});
