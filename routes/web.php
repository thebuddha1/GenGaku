<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WritingCourseController;
use App\Http\Controllers\MainCourseController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hiragana1', [WritingCourseController::class, 'hiraganaTest1']);
Route::get('/hiragana2', [WritingCourseController::class, 'hiraganaTest2']);
Route::get('/hiragana3', [WritingCourseController::class, 'hiraganaTest3']);
Route::get('/hiragana4', [WritingCourseController::class, 'hiraganaTest4']);

Route::get('/katakana1', [WritingCourseController::class, 'katakanaTest1']);
Route::get('/katakana2', [WritingCourseController::class, 'katakanaTest2']);
Route::get('/katakana3', [WritingCourseController::class, 'katakanaTest3']);
Route::get('/katakana4', [WritingCourseController::class, 'katakanaTest4']);


Route::get('/quiz', function () {
    return view('hiragana_test');
});

Route::get('/quiz-kat', function () {
    return view('katakana_test');
});

Route::view('/maincourse-start', 'courses/maincourse-start')->name('courses/maincourse.start');
Route::view('/writingcourse-start', 'courses/writingcourse-start')->name('courses/writingcourse.start');
Route::view('/friends', 'socials/friendsmain')->name('socials/friendsmain');
Route::view('/groups', 'socials/groupsmain')->name('socials/groupsmain');
Route::view('/recommendations', 'recommendations')->name('recommendations');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
