<?php

use App\Http\Controllers\AuthController;
use App\Models\DailySchedule;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login')->middleware('guest');
    Route::post('/auth/authenticate', [AuthController::class, 'store'])->name('authenticate');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout')->middleware('auth');
});

Route::prefix('/{course_id}')->middleware('ensure.course')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Index');
    });
});

// TODO - add auth middleware
Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/hello', function () {
        $course = session('course');
        echo "Hello {$course->name}";
    });

    Route::get('/daily-schedules', function () {
        return Inertia::render('DailySchedules/Index', [
            'daily_schedules' => DailySchedule::with('rate')->orderBy('id')->get()
        ]);
    })->name('daily-schedules');
});

// Routes
// Admin - tenant handled by logged in user
// View/edit Daily Schedule
// View/edit Users
// View/edit Rates
// View/edit TeeTimes
// Public - tenant handled by course_id route prefix
// View/create TeeTimes based on day of week
