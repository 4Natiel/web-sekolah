<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExtracurricularsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('', 'home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::prefix('admin')->group(function () {
    Route::get('/school/index', [SchoolController::class, 'index'])->name('school.index');
    Route::get('/school', [SchoolController::class, 'edit'])->name('school.edit');
    Route::get('/school/about', [SchoolController::class, 'show'])->name('school.show');
    Route::put('/school', [SchoolController::class, 'update'])->name('school.update');
    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
    Route::resource('classes', SchoolClassController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('news', NewsController::class);
    Route::resource('events', EventController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('extracurriculars', ExtracurricularsController::class);
    Route::resource('achievements', AchievementController::class);
});
