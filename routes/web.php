<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InformasiController as AdminInformasiController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\WilayahController as AdminWilayahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routing PesonaJakarta
| Author: Zeini Aswin Rangkuti | v2.0 | 08-11-2026
|--------------------------------------------------------------------------
| 1. Halaman publik   : beranda, detail wilayah, daftar & detail informasi
| 2. Autentikasi      : login & logout admin
| 3. Panel admin      : dashboard + CRUD wilayah, kategori, informasi
*/

// ---- Halaman publik ----
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/wilayah', [HomeController::class, 'daftarWilayah'])->name('wilayah.index');
Route::get('/wilayah/{wilayah}', [HomeController::class, 'wilayah'])->name('wilayah.show');
Route::get('/informasi', [HomeController::class, 'informasi'])->name('informasi.index');
Route::get('/informasi/{informasi}', [HomeController::class, 'detail'])->name('informasi.show');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');

// ---- Autentikasi ----
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ---- Panel admin (wajib login sebagai admin) ----
Route::prefix('admin')->name('admin.')->middleware(IsAdmin::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('wilayah', AdminWilayahController::class)
        ->except('show')->parameters(['wilayah' => 'wilayah']);
    Route::resource('kategori', KategoriController::class)
        ->except('show')->parameters(['kategori' => 'kategori']);
    Route::resource('informasi', AdminInformasiController::class)
        ->except('show')->parameters(['informasi' => 'informasi']);
});