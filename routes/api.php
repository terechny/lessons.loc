<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserLessonsController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('user', UserController::class);
Route::apiResource('lesson', LessonController::class);
Route::apiResource('course', CourseController::class);
Route::apiResource('user_lesson', UserLessonsController::class);

Route::get('/students/progress', [StudyController::class, 'studentsProgress'])->name('students.progress');
Route::get('/weather', [WeatherController::class, 'getWeather'])->name('weather');
