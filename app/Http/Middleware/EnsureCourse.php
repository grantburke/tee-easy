<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $course_id = $request->route('course_id');
        $course = null;

        if ($course_id != null) {
            $course = Course::where('course_id', $course_id)->first();
        }

        if ($course == null) {
            abort(404);
        }

        session(['course' => $course]);

        return $next($request);
    }
}
