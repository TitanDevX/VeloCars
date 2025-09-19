<?php

use App\Models\Car;
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
        Schema::create('car_details', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->foreignIdFor(Car::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("engine_type")->nullable();
            $table->integer('horse_power')->nullable();
            $table->string('drivetrain')->nullable();
            $table->integer('top_speed')->nullable();
            $table->float('acceleration')->nullable();
            $table->string('body_style')->nullable();
            $table->integer('number_of_doors')->nullable();
            $table->float('weight')->nullable();
            $table->char('weight_unit')->default('k'); # k OR p
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->string('tire_size')->nullable();
            $table->longText('features')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_details');
    }
};
