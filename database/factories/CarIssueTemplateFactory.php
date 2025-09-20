<?php

namespace Database\Factories;

use App\Enums\CarIssuePriorityEnum;
use File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarIssueTemplate>
 */
class CarIssueTemplateFactory extends Factory
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
            $jsonPath = storage_path('app\public\car_issues_samples.json');
            $issues = json_decode(File::get($jsonPath), true);
        }

        // Pick a random issue from the JSON
        $sample = $this->faker->randomElement($issues);

        return [
            'title'    => $sample['title'],
            'priority' => CarIssuePriorityEnum::fromName($sample['priority']),
            'details'  => $sample['details'],
        ];
    }
}
