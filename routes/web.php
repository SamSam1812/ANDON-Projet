<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\loginAdminController;
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

Route::get('/', [homeController::class, 'index'])->name('home.page');
Route::get('/login', [loginAdminController::class, 'showLoginForm'])->name('login');
Route::get('/session', [sessionController::class, 'index'])->name('session-form');
Route::post('/login', [loginAdminController::class, 'authenticate']);
Route::post('/logout', [loginAdminController::class, 'logout'])->name('logout');
