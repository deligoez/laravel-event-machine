<?php

namespace Deligoez\EventMachine;

class State
{
    public ?State $machine = null;

    public function __construct(
        public string $name,
        public string $id,
        public ?string $description = null,
        public string|int|null $value = null,
        public State|string|null $parent = null,
        public State|string|null $initialState = null,
    ) {
        $this->machine = $this->parent ? $this->parent->machine : $this;

        if (is_null($this->value)) {
            $this->value = $this->name;
        }

        if (is_string($this->initialState)) {
            $this->initialState = Machine::define([
                'name' => $this->initialState,
                'parent' => $this,
            ]);
        }
    }

}
