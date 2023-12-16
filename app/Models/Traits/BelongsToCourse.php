<?php

namespace App\Models\Traits;

use App\Models\Course;
use App\Models\Scopes\CourseScope;

trait BelongsToCourse
{
    protected static function bootBelongsToCourse()
    {
        static::addGlobalScope(new CourseScope);

        static::creating(function ($model) {
            if (session()->has('course')) {
                $model->course_id = session()->get('course')->id;
            }
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
