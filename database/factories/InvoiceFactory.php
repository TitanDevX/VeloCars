<?php

namespace Database\Factories;

use App\Enums\InvoiceStateEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->numberBetween(100,1000000),
            'state' => InvoiceStateEnum::fromName($this->faker->randomElement(['WAITING','OVERDUE','PAID'])),
        ];
    }
}
