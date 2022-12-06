<?php

use Deligoez\EventMachine\Tests\Stubs\Events\EmailVerifiedEvent;
use Deligoez\EventMachine\Tests\Stubs\Models\User;

it('can test', function () {
    expect(true)->toBeTrue();

    $user = User::factory()->make();

    $this->assertEquals('unverified', $user->email_verified->value());

    EmailVerifiedEvent::dispatch($user);

    $this->assertEquals('verified', $user->email_verified->value());
});
