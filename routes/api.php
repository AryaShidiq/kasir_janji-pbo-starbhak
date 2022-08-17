<?php

use Illuminate\Support\Facades\Route;

//posts
Route::apiResource('/kategori', App\Http\Controllers\Api\KategoriController::class);