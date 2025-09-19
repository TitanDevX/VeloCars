<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'make' => 'Marcedes',
            'model' => 'E300',
            'year' => 2025,
            'color' => 'red',
            'mileage' => 5000,
            'buy_price' => 50000,
            'type' => 'p',
            'used' => false,
    
        ];
    }
}
