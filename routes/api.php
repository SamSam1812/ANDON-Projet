<?php

use App\Http\Controllers\sessionController;
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
Route::post('/production', [sessionController::class, 'store']);

Route::get('/data/{sessionId}', [\App\Http\Controllers\homeController::class, 'getData']);

Route::get('/TRS/{sessionId}', [\App\Http\Controllers\homeController::class, 'TRS']);
Route::post('/add_fake/{sessionId}', [\App\Http\Controllers\generateDbController::class, 'data']);
