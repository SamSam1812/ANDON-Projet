<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\loginAdminController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\csvController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\sessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoriqueController;
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
    Route::get('/historique', [historiqueController::class, 'index'])->name('historique-page');
    Route::get('/historiqueOverview/{id}', [historiqueController::class, 'show'])->name('historique-show-page');
    Route::get('/export-csv/{id}', [csvController::class, 'exportCsv'])->name('csv-export');
});

Route::post('/add_data', [apiController::class, 'addData'])->name('add_data');
