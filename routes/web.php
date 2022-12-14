<?php

use App\Http\Controllers\BensinreportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PermintaankendaraanController;
use App\Http\Controllers\PermintaanbbmController;
use App\Http\Controllers\ReportController;
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
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

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
->except(['data', 'approve', 'export']);
Route::get('/approve/{id}', [PermintaankendaraanController::class, 'approve'])->name('permintaan.setuju');
Route::get('/kembali/{id}', [PermintaankendaraanController::class, 'kembali'])->name('permintaan.kembali');
Route::get('/reject/{id}', [PermintaankendaraanController::class, 'reject'])->name('permintaan.reject');
Route::get('data/permintaan', [PermintaankendaraanController::class, 'data'])->name('permintaan.data');
Route::get('/excel', [PermintaankendaraanController::class, 'export'])->name('permintaan.export');

//route permintaan bensin
Route::resource('bensin', PermintaanbbmController::class)
->except(['data', 'approve']);
Route::get('data/bensin', [PermintaanbbmController::class, 'data'])->name('bensin.data');
Route::get('/excel/bensin', [PermintaanbbmController::class, 'export'])->name('bbm.export');

//reporting
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/data/{tanggal_awal}/{tanggal_akhir}', [ReportController::class, 'getData'])->name('report.getData');
Route::post('/excel/kendaraan', [ReportController::class, 'export'])->name('report.export');

//report bbm
Route::get('/bbm', [BensinreportController::class, 'index'])->name('bbm.index');
Route::get('/bbm/data/{tanggal_awal}/{tanggal_akhir}', [BensinreportController::class, 'getData'])->name('bensin.getData');
Route::post('/excel/bensin', [BensinreportController::class, 'export'])->name('bensin.export');