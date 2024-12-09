<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPemesananController;
use App\Http\Controllers\HistoryPemesananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'index'])->name('logout');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin'], 'as' => 'admin.'], function () {
    Route::post('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan');
    Route::post('/store', [MobilController::class, 'store'])->name('mobil.store');
    Route::put('/update/{id}', [MobilController::class, 'update'])->name('mobil.update');
    Route::delete('/delete/{id}', [MobilController::class, 'delete'])->name('mobil.delete');

    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-management', [UserController::class, 'index'])->name('user');
    Route::put('/user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user-delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/data-pesanan', [DataPemesananController::class, 'index'])->name('datapesanan');
    Route::get('/mobil', [MobilController::class, 'index'])->name('mobil');

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan');
    Route::post('/pemesanan-store', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('/history-pemesanan',[HistoryPemesananController::class, 'index'])->name('history.pemesanan');
});