<?php

use App\Http\Controllers\AlumniController;
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
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
Route::get('/alumni/{id}', [AlumniController::class, 'view'])->name('alumni.view');
Route::get('/alumni/search', [AlumniController::class, 'search'])->name('alumni.search');

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::group(['middleware' => ['guest']], function() {
        // Route::get('/register', 'RegisterController@show')->name('register.show');
        // Route::post('/register', 'RegisterController@register')->name('register.perform');

        Route::view('/', 'welcome')->name('welcome');

        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/reports', function () {
            return view('staff.reports');
        })->name('reports');

        // Route::get('/chapter', function () {
        //     return view('staff.chapter');
        // })->name('chapter');

        Route::get('/records', [AlumniController::class, 'index'])->name('records');
        Route::get('/view-record/{id}', [AlumniController::class, 'view']);

        Route::get('/chapter', [ChapterController::class, 'index'])->name('chapters');

        Route::get('/fillupform', function () {
            return view('staff.fillupform');
        })->name('fillupform');

        Route::get('/alumnidetails', function () {
            return view('staff.alumnidetails');
        })->name('alumnidetails');

        Route::get('/accountpage', function () {
            return view('staff.accountpage');
        })->name('accountpage');


        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});


