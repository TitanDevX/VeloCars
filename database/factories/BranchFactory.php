<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'state' =>  $this->faker->country(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'address' => $this->faker->address(),
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),

        ];
    }
}
