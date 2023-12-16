<?php

namespace App\Listeners;

use App\Models\Course;

class SetCourseIdInSession
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $course = Course::where('id', $event->user->course_id)->first();
        session(['course' => $course]);
    }
}
