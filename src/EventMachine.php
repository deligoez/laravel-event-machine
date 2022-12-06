<?php

namespace Deligoez\EventMachine;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

abstract class EventMachine implements CastsAttributes
{
    // region Auto-Assigned Attributes

    protected string $attributeName;

    protected Model $model;

    protected string $currentValue;

    // endregion

    // region Attributes
    public array $states;

    public string $initialState;

    // endregion

    // region Attribute Casting

    public function get($model, string $key, $value, array $attributes)
    {
        $this->model = $model;
        $this->attributeName = $key;
        $this->currentValue = $value ?? $this->initialState;

        return $this;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        // TODO: Implement set() method.
    }

    // endregion

    // region Public Methods

    public function value(): string
    {
        return $this->currentValue;
    }

    public function send($signal)
    {
        $this->currentValue = $signal;
    }

    // endregion
}
