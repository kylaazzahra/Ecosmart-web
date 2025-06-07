<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\KlasifikasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/klasifikasi/history', [KlasifikasiController::class, 'history'])->name('api.klasifikasi.history');
// Route::post('/klasifikasi', [ApiController::class, 'klasifikasi'])->name('api.klasifikasi');

