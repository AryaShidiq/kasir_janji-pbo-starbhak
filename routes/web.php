<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

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
