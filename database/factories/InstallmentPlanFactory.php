<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InstallmentPlan>
 */
class InstallmentPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'down' => $this->faker->randomFloat(1,1,100),

            'months' => $this->faker->numberBetween(12,60),
            'interest' => $this->faker->randomFloat(1,0.1,1),
            'interest_type' => array_rand(['PER_YEAR_PERCENT','PER_YEAR_AMOUNT','FIXED_PERCENT','FIXED_AMOUNT'])
        ];
    }
}
