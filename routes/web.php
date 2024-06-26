<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\CourseListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PdfController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::group(['middleware' => ['guest']], function() {
        Route::get('/', [LoginController::class, 'landing'])->name('welcome');

        Route::get('/login', [LoginController::class, 'show'])->name('login.show');
        Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

        Route::get('/results', [LoginController::class, 'results'])->name('results');
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        # Records
        Route::get('/records', [AlumniController::class, 'index'])->name('records');
        Route::get('/add-record', [AlumniController::class, 'add_page'])->name('add_page');
        Route::post('/add-record', [AlumniController::class, 'add_alumni'])->name('add_record');
        Route::get('/view-record/{id}', [AlumniController::class, 'view']);
        Route::get('/edit-record/{id}', [AlumniController::class, 'edit_page'])->name('edit_page');
        Route::put('/update-record/{id}', [AlumniController::class, 'update_alumni'])->name('update_alumni');
        Route::delete('/delete-record/{id}', [AlumniController::class, 'destroy']);
        Route::get('/search-record', [AlumniController::class, 'search'])->name('search-record');
        Route::get('/alumni-export', [AlumniController::class, 'export'])->name('alumni-export');

        # Chapters
        Route::get('/chapter', [ChapterController::class, 'index'])->name('chapters');
        Route::post('/add-chapter', [ChapterController::class, 'store'])->name('add-chapter');
        Route::patch('/update-chapter/{id}', [ChapterController::class, 'update'])->name('update-chapter');
        Route::delete('/delete-chapter/{id}', [ChapterController::class, 'destroy'])->name('delete-chapter');
        Route::get('/search-chapter', [ChapterController::class, 'search'])->name('search-chapter');

        # Users
        Route::get('/user', [UserController::class, 'index'])->name('users');
        Route::post('/add-user', [UserController::class, 'store'])->name('add-user');
        Route::patch('/update-user/{id}', [UserController::class, 'update'])->name('update-user');
        Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');
        Route::get('/search-user', [UserController::class, 'search'])->name('search-user');

        # Activity Log
        Route::get('/activity-log', [ActivityController::class, 'index'])->name('activity-log');

        # Course List
        Route::get('course-list', [CourseListController::class, 'index'])->name('course-list');
        Route::get('course-list/show-course/{courseName}', [CourseListController::class, 'show_course'])->name('show_course');

        # Pdf Generator
        // Route::get('show-pdf-test', [PdfController::class, 'index'])->name('show-pdf-test');
        Route::get('generate-pdf/alumni/{id}', [PdfController::class, 'generateAlumniDetails'])->name('generate-alumni-pdf');
        Route::get('/generate-pdf', [PdfController::class, 'generateAllAlumniDetails']);
        Route::get('generate-pdf/alumni/course/{course_name}', [PdfController::class, 'generateAlumnisByCourse'])->name('generate-alumni-by-course-pdf');

        # Other Routes
        Route::get('/alumnidetails', function () {
            return view('staff.alumnidetails');
        })->name('alumnidetails');

        Route::get('/accountpage', function () {
            return view('staff.accountpage');
        })->name('accountpage');


        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});


