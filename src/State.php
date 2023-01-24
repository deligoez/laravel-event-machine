<?php

namespace Deligoez\EventMachine;

class State
{
    public ?State $machine = null;

    public function __construct(
        public string $name,
        public string $id,
        public ?State $parent = null,
        public ?string $description = null,
        public ?string $initialState = null,
    ) {
        //$this->machine = $this->parent ? $this->parent->machine : $this;
        $this->machine = $this;
    }

}
