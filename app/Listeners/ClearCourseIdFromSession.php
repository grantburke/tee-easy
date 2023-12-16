<?php

namespace App\Listeners;

class ClearCourseIdFromSession
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        session()->forget('course');
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
