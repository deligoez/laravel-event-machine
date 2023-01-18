<?php

namespace Deligoez\EventMachine\Tests\Stubs\Machines;

use Deligoez\EventMachine\MachineDefinition;

class ToggleMachine extends MachineDefinition
{
    protected static function define(): array
    {
        return [
            'id'            => 'toggle_machine',
            'initial_state' => 'inactive',
            'states' => [
                'inactive' => [
                    'transitions' => [
                        'TOGGLE' => 'active',
                    ],
                ],
                'active' => [
                    'transitions' => [
                        'TOGGLE' => 'inactive',
                    ],
                ],
            ],
        ];
    }
}
