<?php

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
        Schema::create('position_comfort_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comfort_category_id')->constrained('comfort_categories');
            $table->foreignId('employee_position_id')->constrained('employee_positions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_comfort_categories');
    }
};
