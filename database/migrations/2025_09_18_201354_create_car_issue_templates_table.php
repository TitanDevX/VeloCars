<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_issue_templates', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('title', 40);
            $table->longText('details')->nullable();
            $table->string('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_issue_templates');
    }
};
