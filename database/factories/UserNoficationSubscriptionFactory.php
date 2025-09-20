<?php

namespace Database\Factories;

use App\Enums\UserNotifSubEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserNoficationSubscription>
 */
class UserNoficationSubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(UserNotifSubEnum::cases())
        ];
    }
}
