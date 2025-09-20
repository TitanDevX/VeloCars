<?php

namespace Database\Factories;

use File;
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
       static $cars = null;
        if ($cars === null) {
            $jsonPath = storage_path('app\public\car_samples.json');
            $cars = json_decode(File::get($jsonPath), true);
        }

        $sample = $this->faker->randomElement($cars);

        return [
            'make'                  => $sample['make'],
            'model'                 => $sample['model'],
            'year'                  => $sample['year'],
            'color'                 => $sample['color'],
            'mileage'               => $sample['mileage'],
            'vin'                   => $sample['vin'],
            'buy_price'             => $sample['buy_price'],
            'rent_price'            => $sample['rent_price'],
            'type'                  => $sample['type'],
            'used'                  => $sample['used'],
            'available_for_rent'    => $sample['available_for_rent'],
        ];
    }
}
