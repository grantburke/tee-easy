<?php

use App\Models\DailySchedule;
use Illuminate\Http\Request;
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

Route::prefix('/{tenant_id}')->group(function () {
    Route::get('/hello', function (Request $request) {
        echo "Hello {$request->tenant_id}";
    });
});

Route::get('/', function () {
    return Inertia::render('Index');
});

Route::get('/daily-schedules', function () {
    return Inertia::render('DailySchedules/Index', [
        'daily_schedules' => DailySchedule::with('rate')->get()
    ]);
});
