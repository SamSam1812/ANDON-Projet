<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\loginAdminController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\sessionController;
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

Route::get('/login', [loginAdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginAdminController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
    Route::get('/', [homeController::class, 'index'])->name('home.page');
    Route::get('/home/{id}', [homeController::class, 'sessionStart'])->name('home.session.page');
    Route::get('/session', [sessionController::class, 'index'])->name('session-form');
    Route::get('/logout', [loginAdminController::class, 'logout'])->name('logout');
    Route::get('/stop/{id}', [sessionController::class, 'stop'])->name('stop-prod');
});

Route::post('/add_data', [apiController::class, 'addData'])->name('add_data');