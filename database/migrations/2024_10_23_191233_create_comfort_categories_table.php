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
        Schema::create('comfort_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('comfort_category_id')->nullable()->constrained('comfort_categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comfort_categories');
    }
};
