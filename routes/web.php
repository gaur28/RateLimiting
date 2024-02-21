<?php

use App\Http\Controllers\RateLimiterController;
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

// Route::get('/', [RateLimiterController::class, 'show'])->middleware(['throttle:1,1'])->name('home');
// Route::get('/', [RateLimiterController::class, 'show'])->name('home');
// route::get('sessionClosed', [RateLimiterController::class, 'sessionClosed'])->name('sessionClosed');
// Route::post('close-session', [RateLimiterController::class, 'closeSession'])->name('closeSession');

Route::get('/', [RateLimiterController::class, 'index'])->middleware('rateLimiting')->name('home');
