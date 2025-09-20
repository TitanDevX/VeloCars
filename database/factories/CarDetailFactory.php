<?php

namespace Database\Factories;

use File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarDetail>
 */
class CarDetailFactory extends Factory
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
            $jsonPath = storage_path('app\public\car_details_samples.json');
            $cars = json_decode(File::get($jsonPath), true);
        }

        $sample = $this->faker->randomElement($cars);

        return [
            'engine_type'      => $sample['engine_type'],
            'horse_power'      => $sample['horse_power'],
            'drivetrain'       => $sample['drivetrain'],
            'top_speed'        => $sample['top_speed'],
            'acceleration'     => $sample['acceleration'],
            'body_style'       => $sample['body_style'],
            'number_of_doors'  => $sample['number_of_doors'],
            'weight'           => $sample['weight'],
            'weight_unit'      => $sample['weight_unit'],
            'length'           => $sample['length'],
            'width'            => $sample['width'],
            'height'           => $sample['height'],
            'tire_size'        => $sample['tire_size'],
            'features'         => $sample['features'],
        ];
    }
}
