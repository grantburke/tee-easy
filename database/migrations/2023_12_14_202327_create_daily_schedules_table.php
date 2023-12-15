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
        Schema::create('daily_schedules', function (Blueprint $table) {
            $table->id();
            $table->enum('day_of_week', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->time('twilight_start_time')->nullable();
            $table->boolean('is_closed')->default(false);
            $table->timestamps();

            $table->foreignId('rate_id')->constrained()->cascadeOnDelete();

            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->unique(['course_id', 'day_of_week']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_schedules');
    }
};
