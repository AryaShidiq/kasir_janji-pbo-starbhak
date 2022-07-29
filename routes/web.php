<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TransaksiController;

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
Route::get('/crtmenu',[MenuController::class, 'crtmenu'])->name('crtmenu');

Route::post('/strmenu',[MenuController::class, 'strmenu'])->name('strmenu');

Route::get('/editmenu/{id}',[MenuController::class, 'editmenu'])->name('editmenu');

Route::put('/updatemenu/{id}',[MenuController::class, 'updtmenu'])->name('updtmenu');

Route::delete('/deletemenu/{id}',[MenuController::class, 'dltmenu'])->name('dltmenu');

// pegawai
Route::get('/pegawai',[PegawaiController::class, 'indexpegawai'])->name('pegawai');

Route::get('/crtpegawai',[PegawaiController::class, 'crtpegawai'])->name('crtpegawai');

Route::post('/strpegawai',[PegawaiController::class, 'strpegawai'])->name('strpegawai');

Route::get('/editpegawai/{id}',[PegawaiController::class, 'editpegawai'])->name('editpegawai');

Route::put('/updatepegawai/{id}',[PegawaiController::class, 'updtpegawai'])->name('updtpegawai');

Route::delete('/deletepegawai/{id}',[PegawaiController::class, 'dltpegawai'])->name('dltpegawai');

// histor
Route::get('/history',[HistoryController::class, 'indexhistory'])->name('history');

// Transaksi
Route::get('/transaksi',[TransaksiController::class, 'indextransaksi'])->name('transaksi');
