<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::get('/form', [FormController::class, 'createForm'])->name('form.create');
Route::post('/form', [FormController::class, 'storeForm'])->name('form.store');
Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    // Route::get('/', [UserController::class,'show']);

    Route::group(['middleware' => ['guest']], function() {
        // Route::get('/register', 'RegisterController@show')->name('register.show');
        // Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::get('/', function() {
            return view('welcome');
        })->name('welcome');

        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/reports', function () {
            return view('staff.reports');
        })->name('reports');

        Route::get('/records', [AlumniController::class, 'index'])->name('records');

        Route::get('/fillupform', function () {
            return view('staff.fillupform');
        })->name('fillupform');

        Route::get('/alumnidetails', function () {
            return view('staff.alumnidetails');
        })->name('alumnidetails');


        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});



