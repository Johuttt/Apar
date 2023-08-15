<?php

use App\Http\Controllers\AparController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('auth.login');
});

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/apar', AparController::class)->except('show')->middleware('auth');

use App\Http\Controllers\CheckSheetCo2Controller;

// Menggunakan middleware auth untuk routes terkait checksheetco2
Route::middleware(['auth'])->group(function () {
    Route::get('/checksheetco2', [CheckSheetCo2Controller::class, 'index'])->name('checksheetco2.index');
    Route::post('/checksheetco2', [CheckSheetCo2Controller::class, 'store'])->name('checksheetco2.store');
});

use App\Http\Controllers\CheckSheetPowderController;

// Menggunakan middleware auth untuk routes terkait checksheetpowder
Route::middleware(['auth'])->group(function () {
    Route::get('/checksheetpowder', [CheckSheetPowderController::class, 'index'])->name('checksheetpowder.index');
    Route::post('/checksheetpowder', [CheckSheetPowderController::class, 'store'])->name('checksheetpowder.store');
});