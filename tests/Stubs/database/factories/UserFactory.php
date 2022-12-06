<?php

declare(strict_types=1);

namespace Deligoez\EventMachine\Tests\Stubs\Database\Factories;

use Deligoez\EventMachine\Tests\Stubs\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->email(),
        ];
    }
}
