<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WritingCourseController;
use App\Http\Controllers\MainCourseController;
use App\Http\Controllers\GroupsController;
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
Route::post('/save-prog-hir', [WritingCourseController::class, 'saveProgressHir'])->name('save-prog-hir');
Route::post('/save-prog-kat', [WritingCourseController::class, 'saveProgressKat'])->name('save-prog-kat');
Route::post('/save-prog', [MainCourseController::class, 'saveProgress'])->name('save-prog');

Route::post('/save-group', [GroupsController::class, 'makeGroup'])->name('save-group');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //kvízek - hiragana
    Route::get('/hiragana1/{num}', [WritingCourseController::class, 'hiraganaTest1']);
    Route::get('/hiragana2/{num}', [WritingCourseController::class, 'hiraganaTest2']);
    Route::get('/hiragana3/{num}', [WritingCourseController::class, 'hiraganaTest3']);
    Route::get('/hiragana4/{num}', [WritingCourseController::class, 'hiraganaTest4']);
    //kvízek - katakana
    Route::get('/katakana1/{num}', [WritingCourseController::class, 'katakanaTest1']);
    Route::get('/katakana2/{num}', [WritingCourseController::class, 'katakanaTest2']);
    Route::get('/katakana3/{num}', [WritingCourseController::class, 'katakanaTest3']);
    Route::get('/katakana4/{num}', [WritingCourseController::class, 'katakanaTest4']);
    //kvízek - főkurzus
    Route::get('/word1/{chap}/{less}', [MainCourseController::class, 'wordTest1']);
    Route::get('/word2/{chap}/{less}', [MainCourseController::class, 'wordTest2']);
    Route::get('/sentence1/{chap}/{less}', [MainCourseController::class, 'sentenceTest1']);
    Route::get('/sentence2/{chap}/{less}', [MainCourseController::class, 'sentenceTest2']);
    //íráskurzus tesztek
    Route::get('/quiz-hir', function () {
        return view('courses\writingcourses\hiragana\hiragana_test');
    });
    
    Route::get('/quiz-kat', function () {
        return view('courses\writingcourses\katakana\katakana_test');
    });
    //főkurzus teszt
    Route::get('/quiz-main', function () {
        return view('courses\maincourse\main_test');
    });
    //íráskurzusok
    Route::get('/hiragana-course', function () {
        return view('courses\hiragana_course');
    });
    Route::get('/katakana-course', function () {
        return view('courses\katakana_course');
    });
    //gruppok
    Route::get('/group-make', function () {
        return view('socials\makegroup');
    });
    Route::get('/group-find', function () {
        return view('socials\findgroups');
    });
    Route::get('/group-show', function () {
        return view('socials\group');
    });

    //menüpontok
    Route::view('/maincourse-start', 'courses/maincourse-start')->name('courses/maincourse.start');
    Route::view('/writingcourse-start', 'courses/writingcourse-start')->name('courses/writingcourse.start');
    Route::view('/friends', 'socials/friendsmain')->name('socials/friendsmain');
    Route::get('/groups', [GroupsController::class, 'index'])->name('groups.index');
    Route::view('/recommendations', 'recommendations')->name('recommendations');


    //
    //Route::post('/update-user-experience', 'WritingCourseController@updateUserExperience');
});
