<?php

namespace Deligoez\EventMachine\Tests\Stubs\Machines;

use Deligoez\EventMachine\MachineDefinition;

class AuthenticationMachine extends MachineDefinition
{
    protected static function define(): array
    {
        return [
            'id'            => 'authentication_machine',
            'initial_state' => 'logged_out_state',
            'states'        => [
                [
                    'name'        => 'logged_out_state',
                    'transitions' => [
                        [
                            'source_state' => 'logged_out_state',
                            'event'        => 'login_event',
                            'target_state' => 'logged_in_state',
                            'actions'      => [
                                ['name' => 'login_action']
                            ],
                        ],
                    ],
                ],
                [
                    'name'        => 'logged_in_state',
                    'transitions' => [
                        [
                            'source_state' => 'logged_in_state',
                            'event'        => 'logout_event',
                            'target_state' => 'logged_out_state',
                            'actions'      => [
                                ['name' => 'logout_action']
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
