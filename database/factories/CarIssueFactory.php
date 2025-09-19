<?php

namespace Database\Factories;

use File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarIssue>
 */
class CarIssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         static $issues = null;
        if ($issues === null) {
            $jsonPath = storage_path('public/car_issues_samples.json');
            $issues = json_decode(File::get($jsonPath), true);
        }

        // Pick a random issue from the JSON
        $sample = $this->faker->randomElement($issues);

        return [
            'title'    => $sample['title'],
            'priority' => $sample['priority'],
            'details'  => $sample['details'],
            'state' => array_rand(['UNTOUCHED','FIXING', 'FIXED'])
        ];
    }
}
