<?php

use Illuminate\Support\Facades\Route;

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
