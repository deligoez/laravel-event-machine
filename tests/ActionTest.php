<?php

use Deligoez\EventMachine\Action;
use Spatie\LaravelData\DataCollection;

test('action', function () {
    $action = Action::from(['name' => 'login_action_1']);

    expect($action)->toBeInstanceOf(Action::class);
});

test('actions', function () {
    $actions = Action::collection([
        ['name' => 'login_action_1'],
        ['name' => 'login_action_2'],
    ]);

    expect($actions)->toBeInstanceOf(DataCollection::class);

    foreach ($actions as $action) {
        expect($action)->toBeInstanceOf(Action::class);
    }
});
