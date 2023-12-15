<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\DailySchedule;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $courses = [
            Course::factory()->create([
                'name' => 'Pebble Beach Golf Links',
                'course_id' => 'pebble-beach',
            ]),
            Course::factory()->create([
                'name' => 'Spyglass Hill Golf Course',
                'course_id' => 'spyglass-hill',
            ])
        ];

        foreach ($courses as $course) {
            $weekday_rate_id = Rate::factory()->create([
                'name' => 'Weekday',
                'full_round_rate' => fake()->randomFloat(2, 50, 60),
                'half_round_rate' => fake()->randomFloat(2, 30, 40),
                'twilight_rate' => 50.00,
                'course_id' => $course->id
            ])->id;

            $weekend_rate_id = Rate::factory()->create([
                'name' => 'Weekend',
                'full_round_rate' => fake()->randomFloat(2, 60, 70),
                'half_round_rate' => fake()->randomFloat(2, 40, 50),
                'twilight_rate' => 55.00,
                'course_id' => $course->id
            ])->id;

            DailySchedule::factory()->create([
                'day_of_week' => 'Monday',
                'opening_time' => '06:00',
                'closing_time' => '17:00',
                'twilight_start_time' => '13:00',
                'rate_id' => $weekday_rate_id,
                'course_id' => $course->id
            ]);
            DailySchedule::factory()->create([
                'day_of_week' => 'Tuesday',
                'opening_time' => '10:00',
                'closing_time' => '17:00',
                'twilight_start_time' => '13:00',
                'rate_id' => $weekday_rate_id,
                'course_id' => $course->id
            ]);
            DailySchedule::factory()->create([
                'day_of_week' => 'Wednesday',
                'opening_time' => '06:00',
                'closing_time' => '17:00',
                'twilight_start_time' => '13:00',
                'rate_id' => $weekday_rate_id,
                'course_id' => $course->id
            ]);
            DailySchedule::factory()->create([
                'day_of_week' => 'Thursday',
                'opening_time' => '06:00',
                'closing_time' => '17:00',
                'twilight_start_time' => '13:00',
                'rate_id' => $weekday_rate_id,
                'course_id' => $course->id
            ]);
            DailySchedule::factory()->create([
                'day_of_week' => 'Friday',
                'opening_time' => '06:00',
                'closing_time' => '17:00',
                'twilight_start_time' => '13:00',

                'rate_id' => $weekday_rate_id,
                'course_id' => $course->id
            ]);
            DailySchedule::factory()->create([
                'day_of_week' => 'Saturday',
                'opening_time' => '06:00',
                'closing_time' => '17:00',
                'twilight_start_time' => '13:00',
                'rate_id' => $weekend_rate_id,
                'course_id' => $course->id
            ]);
            DailySchedule::factory()->create([
                'day_of_week' => 'Sunday',
                'opening_time' => '06:00',
                'closing_time' => '17:00',
                'twilight_start_time' => '13:00',
                'rate_id' => $weekend_rate_id,
                'course_id' => $course->id
            ]);

            User::factory()->create([
                'name' => "{$course->name} Admin",
                'email' => "admin@{$course->course_id}.com",
                'course_id' => $course->id
            ]);
        }
    }
}
