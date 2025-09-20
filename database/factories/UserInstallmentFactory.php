<?php

namespace Database\Factories;

use App\Enums\InstallmentStateEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInstallment>
 */
class UserInstallmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        
            'next_invoice_date' => $this->faker->dateTime(),
            'state' => InstallmentStateEnum::fromName( $this->faker->randomElement(['WAITING','ACTIVE','DEFAULT']) )
        ];
    }
}
