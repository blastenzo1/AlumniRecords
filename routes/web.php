<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/',[UserController::class,'show']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/records', function () {
    return view('records');
})->name('records');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/fillupform', function () {
    return view('fillupform');
})->name('fillupform');

