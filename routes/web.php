<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

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

        # Chapters
        Route::get('/chapter', [ChapterController::class, 'index'])->name('chapters');
        Route::post('/add-chapter', [ChapterController::class, 'store'])->name('add-chapter');
        Route::patch('/update-chapter/{id}', [ChapterController::class, 'update'])->name('update-chapter');
        Route::delete('/delete-chapter/{id}', [ChapterController::class, 'destroy'])->name('delete-chapter');

        # Useres
        Route::get('/user', [UserController::class, 'index'])->name('users');
        Route::post('/add-user', [UserController::class, 'store'])->name('add-user');
        Route::patch('/update-user/{id}', [UserController::class, 'update'])->name('update-user');
        Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');

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


