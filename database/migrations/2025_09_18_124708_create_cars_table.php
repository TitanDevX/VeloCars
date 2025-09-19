<?php

use App\Models\Branch;
use App\Models\CarDetail;
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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string("make", 10);
            $table->string("model", 20);
            $table->integer("year");
            $table->string("color",10);
            $table->bigInteger("mileage");
            $table->string('vin',17)->nullable();
            $table->integer('buy_price');
            $table->integer('rent_price'); # Per day
            $table->char('type')->default('p'); # p = patrol, e = electric, h = hyprid.
            // $table->foreignIdFor(User::class,'seller')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->boolean('seller_is_owner')->default(true);
            $table->boolean('used')->default(true);
            $table->boolean('available_for_rent')->default(false);
            $table->foreignIdFor(Branch::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class,"sold_to_user_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
