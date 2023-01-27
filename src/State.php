<?php

namespace Deligoez\EventMachine;

class State
{
    public const DEFAULT_NAME = 'event_machine';
    public ?State $machine = null;
    public ?string $path = null;

    /**
     * Initialize a new State instance.
     *
     * @param  string|int|null  $value
     * @param  \Deligoez\EventMachine\State|string|null  $parent
     * @param  \Deligoez\EventMachine\State|string|null  $initialState
     * @param  array|null  $states
     */
    public function __construct(
        public ?string $name = null,
        // TODO: ID is only used when starting the machine, it is not absolutely required when defining
        // - $machine->start($id), $machine->startWithId($id)
        public ?string $id = null,
        public ?string $description = null,
        public ?int $version = 1,
        public string|int|null $value = null,
        public State|string|null $parent = null,
        public State|string|null $initialState = null,
        public array|null $states = null,
    ) {
        // If parent is not defined, use $this (State) as parent
        $this->machine = $this->parent ? $this->parent->machine : $this;

        // If name is not defined, use default name
        $this->name = !empty($this->name) ? $this->name : self::DEFAULT_NAME;

        // If value is not defined, use name as value
        $this->value = $this->value ?? $this->name;

        // If id is not defined, generate a unique id
        $this->id = !empty($this->id) ? $this->id : uniqid(prefix: false, more_entropy: true);

        // Version must be greater than 0
        $this->version = $this->version >= 1 ? $this->version : 1;

        // If description is empty, make it null
        $this->description = !empty($this->description) ? $this->description : null;

        // Generate path
        $this->path = $this->parent ? $this->parent->path.'.'.$this->name : $this->name;

        // Initialize states
        if (!is_null($this->states)) {
            foreach ($this->states as $key => $state) {
                // If it is only has a state name, initialize a state using that name
                if (is_string($state)) {
                    unset($this->states[$key]);
                    $this->states[$state] = Machine::define([
                        'name'   => $state,
                        'parent' => $this,
                    ]);

                    continue;
                }

                // If it is an array, initialize a state using that array state definition
                $this->states[$key] = Machine::define(
                    $state + [
                        'name'   => $key,
                        'parent' => $this,
                    ]
                );
            }
        }

        // If initial state is not initialized, initialize it
        if (!empty($this->initialState)) {
            $this->initialState = (
                !is_null($this->states) &&
                array_key_exists($this->initialState, $this->states)
            )
                // If it is defined on $this->states, use it
                ? $this->states[$this->initialState]
                // Otherwise, create a new state
                : Machine::define([
                    'name'   => $this->initialState,
                    'parent' => $this,
                ]);
        }

        // If no initial state is defined, use the first state as initial state
        if (is_null($this->initialState) && (!is_null($this->states) && ($this->states !== []))) {
            $this->initialState = $this->states[array_key_first($this->states)];
        }
    }
}
