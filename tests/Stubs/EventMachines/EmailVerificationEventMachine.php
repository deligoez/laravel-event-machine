<?php

namespace Deligoez\EventMachine\Tests\Stubs\EventMachines;

use Deligoez\EventMachine\EventMachine;

class EmailVerificationEventMachine extends EventMachine
{
    public array $states = [
        'unverified',
        'verified',
    ];
    public string $initialState = 'unverified';


}
