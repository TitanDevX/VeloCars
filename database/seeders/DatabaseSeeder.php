<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Car;
use App\Models\CarDetail;
use App\Models\CarIssue;
use App\Models\CarIssueTemplate;
use App\Models\InstallmentPlan;
use App\Models\Invoice;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserInstallment;
use App\Models\UserNoficationSubscription;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(PermissionSeeder::class);
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole('admin');
        UserNoficationSubscription::factory()->for($user)->create([
            'type' => 'ALL'
        ]);
        $branch = Branch::factory()->create();
        $oneCar = Car::factory()->for($branch, 'branch')->has(CarDetail::factory(), 'details')->create();
        $soldCar = Car::factory()->for($user, 'soldTo')->for($branch, 'branch')->create();
        CarIssueTemplate::factory()->createMany(10);
        CarIssue::factory()->for($oneCar, 'car')->create();
        CarIssue::factory()->for($oneCar, 'car')->for($user, 'fixer')->create();


        InstallmentPlan::factory()->createMany(10);


        for ($i = 0; $i < 10; $i++) {
            $car = Car::factory()->for($branch, 'branch')->has(CarDetail::factory(), 'details')->create();
            CarIssue::factory()->for($car, 'car')->create();
            UserInstallment::factory()->for(InstallmentPlan::inRandomOrder()->first())
                ->for($user, 'user')
                ->for($car, 'car')
                ->create();
            Invoice::factory()->for(User::inRandomOrder()->first(), 'user')
                ->for($car, 'payable')->createMany(10);
        }

    }
}
