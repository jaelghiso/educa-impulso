<?php

use App\Http\Resources\WWbatAreaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('posts', 'PostController');
Route::apiResource('courses', 'CourseController');
Route::apiResource('summaries', 'SummaryController');
Route::apiResource('events', 'EventController');
Route::apiResource('wwbat-areas', 'WwbatAreaController');
Route::apiResource('bigwords-areas', 'BigWordsAreaController');
Route::apiResource('schedule-areas', 'ScheduleAreaController');
Route::apiResource('doNow-areas', 'DoNowController');
Route::apiResource('exitTicket-areas', 'ExitTicketController');
Route::apiResource('guidedPractice-areas', 'GuidedPracticeController');
Route::apiResource('individualPractice-areas', 'IndividualPracticeController');
