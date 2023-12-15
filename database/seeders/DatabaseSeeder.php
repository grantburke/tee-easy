<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\DailySchedule;
use App\Models\Rate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $course_id = Course::factory()->create([
            'name' => 'Pebble Beach Golf Links',
            'course_id' => 'pebble-beach',
        ])->id;

        $weekday_rate_id = Rate::factory()->create([
            'name' => 'Weekday',
            'full_round_rate' => 60.00,
            'half_round_rate' => 35.00,
            'twilight_rate' => 50.00,
            'twilight_start_time' => '13:00',
            'course_id' => $course_id
        ])->id;

        $weekend_rate_id = Rate::factory()->create([
            'name' => 'Weekend',
            'full_round_rate' => 70.00,
            'half_round_rate' => 40.00,
            'twilight_rate' => 55.00,
            'twilight_start_time' => '13:00',
            'course_id' => $course_id
        ])->id;

        DailySchedule::factory()->create([
            'day_of_week' => 'Monday',
            'opening_time' => '06:00',
            'closing_time' => '17:00',
            'rate_id' => $weekday_rate_id,
            'course_id' => $course_id
        ]);
        DailySchedule::factory()->create([
            'day_of_week' => 'Tuesday',
            'opening_time' => '10:00',
            'closing_time' => '17:00',
            'rate_id' => $weekday_rate_id,
            'course_id' => $course_id
        ]);
        DailySchedule::factory()->create([
            'day_of_week' => 'Wednesday',
            'opening_time' => '06:00',
            'closing_time' => '17:00',
            'rate_id' => $weekday_rate_id,
            'course_id' => $course_id
        ]);
        DailySchedule::factory()->create([
            'day_of_week' => 'Thursday',
            'opening_time' => '06:00',
            'closing_time' => '17:00',
            'rate_id' => $weekday_rate_id,
            'course_id' => $course_id
        ]);
        DailySchedule::factory()->create([
            'day_of_week' => 'Friday',
            'opening_time' => '06:00',
            'closing_time' => '17:00',
            'rate_id' => $weekday_rate_id,
            'course_id' => $course_id
        ]);
        DailySchedule::factory()->create([
            'day_of_week' => 'Saturday',
            'opening_time' => '06:00',
            'closing_time' => '17:00',
            'rate_id' => $weekend_rate_id,
            'course_id' => $course_id
        ]);
        DailySchedule::factory()->create([
            'day_of_week' => 'Sunday',
            'opening_time' => '06:00',
            'closing_time' => '17:00',
            'rate_id' => $weekend_rate_id,
            'course_id' => $course_id
        ]);
    }
}
