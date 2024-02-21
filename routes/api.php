<?php

use App\Http\Controllers\RateLimiterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('continue-session', [RateLimiterController::class, 'continueSession'])->middleware(['rateLimiting', 'throttle:1,1'])->name('continueSession');
Route::post('close-session', [RateLimiterController::class, 'closeSession'])->middleware(['rateLimiting', 'throttle:1,1'])->name('closeSession');

