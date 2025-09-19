<?php

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_rentals', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->foreignIdFor(User::class, "renter_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Car::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('days');
            $table->integer('insurance');
            // $table->float('mileage_limit_per_day'); # 0 => no limit.
            // $table->char('mileage_unit')->default('k');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_rentals');
    }
};
