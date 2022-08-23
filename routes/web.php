<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PermintaankendaraanController;
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
    return view('dashboard.index');
});

//route kendaraan
Route::resource('kendaraan', KendaraanController::class)
    ->except('data');
Route::get('/data/kendaraan', [KendaraanController::class, 'data'])->name('kendaraan.data');

//route driver
Route::resource('driver', DriverController::class)
    ->except('data');
Route::get('data/driver', [DriverController::class, 'data'])->name('driver.data');

//route permintaan kendaraan
Route::resource('permintaan', PermintaankendaraanController::class)
    ->except('data');
Route::get('data/permintaan', [PermintaankendaraanController::class, 'data'])->name('permintaan.data');
