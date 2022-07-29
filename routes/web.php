<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PegawaiController;

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
    return view('layout/dashboard');
});

Route::get('/login', function () {
    return view('login/sign-in');
});

Route::get('/register', function () {
    return view('register/sign-up');

});

// Menu
Route::get('/datamenu',[MenuController::class, 'index'])->name('menu');

// pegawai
Route::get('/pegawai',[PegawaiController::class, 'index'])->name('pegawai');

Route::get('/crtpegawai',[PegawaiController::class, 'crtpegawai'])->name('crtpegawai');

Route::post('/strpegawai',[PegawaiController::class, 'strpegawai'])->name('strpegawai');

Route::get('/editpegawai/{id}',[PegawaiController::class, 'editpegawai'])->name('editpegawai');

Route::put('/updatepegawai/{id}',[PegawaiController::class, 'updtpegawai'])->name('updtpegawai');

Route::get('/deletepegawai/{id}',[PegawaiController::class, 'dltegawai'])->name('dltpegawai');

// histor
Route::get('/history',[HistoryController::class, 'index'])->name('history');
