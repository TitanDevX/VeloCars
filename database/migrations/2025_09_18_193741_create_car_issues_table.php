<?php

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Builder\Use_;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_issues', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->foreignIdFor(Car::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title', 40);
            $table->longText('details')->nullable();
            $table->enum('state', ['UNTOUCHED','FIXING', 'FIXED']);
            $table->string('priority');
            $table->foreignIdFor(User::class, 'fixer_id')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_issues');
    }
};
