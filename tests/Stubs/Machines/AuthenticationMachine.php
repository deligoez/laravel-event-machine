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
                'logged_out_state' => [
                    'transitions' => [
                        'login_event' => [
                            'target_state' => 'logged_in_state',
                            'actions'      => [
                                'login_action_1',
                                'login_action_2',
                            ],
                        ],
                    ],
                ],
                'logged_in_state'  => [
                    'transitions' => [
                        'logout_event' => [
                            'target_state' => 'logged_out_state',
                            'actions'      => 'logout_action',
                        ],
                    ],
                ],
            ],
        ];
    }
}
