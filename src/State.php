<?php

namespace Deligoez\EventMachine;

class State
{
    public ?State $machine = null;

    /**
     * @param  string                                    $name
     * @param  string                                    $id
     * @param  string|null                               $description
     * @param  string|int|null                           $value
     * @param  \Deligoez\EventMachine\State|string|null  $parent
     * @param  \Deligoez\EventMachine\State|string|null  $initialState
     * @param  array|null                                $states  $states
     */
    public function __construct(
        public string $name,
        public string $id,
        public ?string $description = null,
        public string|int|null $value = null,
        public State|string|null $parent = null,
        public State|string|null $initialState = null,
        public array|null $states = null,
    ) {
        $this->machine = $this->parent ? $this->parent->machine : $this;

        if (is_null($this->value)) {
            $this->value = $this->name;
        }

        // Initialize states
        if (!is_null($this->states)) {
            foreach ($this->states as $key => $state) {
                // If it is only has a state name
                if (is_string($state)) {
                    unset($this->states[$key]);
                    $this->states[$state] = Machine::define([
                        'name'   => $state,
                        'parent' => $this,
                    ]);

                    continue;
                }

                $this->states[$key] = Machine::define(
                    $state + [
                        'name'   => $key,
                        'parent' => $this,
                    ]
                );
            }
        }

        // If initial state is not initialized, initialize it
        if (is_string($this->initialState)) {
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
        if (is_null($this->initialState) && !is_null($this->states)) {
            $this->initialState = $this->states[array_key_first($this->states)];
        }
    }

}
