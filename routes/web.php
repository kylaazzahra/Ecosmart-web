<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/auth/login', [AuthController::class, 'login'])->middleware(AuthMiddleware::class)->name('auth.login');
Route::post('/auth/login/process', [AuthController::class, 'loginProcess'])->name('auth.login.post');

Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/register/process', [AuthController::class, 'registerProcess'])->name('auth.register.post');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/camera',[KlasifikasiController::class, 'form'])->middleware(AuthMiddleware::class)->name('camera');
Route::post('/klasifikasi', [KlasifikasiController::class, 'klasifikasi'])->middleware(AuthMiddleware::class)->name('api.klasifikasi');

Route::get('/profile', [AuthController::class, 'profile'])->middleware(AuthMiddleware::class)->name('profile');
Route::get('/edit-profile', [AuthController::class, 'editProfile'])->middleware(AuthMiddleware::class)->name('edit.profile');
Route::put('/profile/update', [AuthController::class, 'updateProfile'])->middleware(AuthMiddleware::class)->name('profile.update');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/about-us', function () {
    return view('about');
})->name('aboutus');

Route::get('/hasil-klasifikasi', [KlasifikasiController::class, 'hasil'])->name('hasil.klasifikasi');
Route::post('/simpan-history', [KlasifikasiController::class, 'simpan'])->name('simpan.history');
Route::get('/history', [KlasifikasiController::class, 'history'])->name('lihat.history');

Route::get('/admin', [AdminController::class, 'index'])->middleware(AuthMiddleware::class)->name('admin.dashboard');
Route::post('/admin/add-user', [AdminController::class, 'addUser'])->middleware(AuthMiddleware::class)->name('admin.add.user');
Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->middleware(AuthMiddleware::class)->name('admin.delete.user');
Route::put('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->middleware(AuthMiddleware::class)->name('admin.update.user');
Route::post('/admin/add/klasifikasi', [AdminController::class, 'addKlasifikasi'])->middleware(AuthMiddleware::class)->name('admin.add.klasifikasi');
Route::put('/admin/update-klasifikasi/{id}', [AdminController::class, 'updateKlasifikasi'])->middleware(AuthMiddleware::class)->name('admin.update.klasifikasi');
Route::delete('/admin/klasifikasi/delete/{id}', [AdminController::class, 'deleteKlasifikasi'])->middleware(AuthMiddleware::class)->name('admin.klasifikasi.delete');