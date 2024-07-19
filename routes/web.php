<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanKomulatifController;
use App\Http\Controllers\LaporanPemasukanController;
use App\Http\Controllers\LaporanPengeluaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('', 'login')->name('login');
    Route::post('post-login', 'postLogin')->name('postLogin');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });
    Route::controller(PenggunaController::class)->group(function () {
        Route::get('pengguna', 'index')->name('pengguna');
        Route::post('pengguna/add', 'add')->name('pengguna.add');
        Route::post('pengguna/update/{id}', 'update')->name('pengguna.update');
        Route::get('pengguna/delete/{id}', 'delete')->name('pengguna.delete');
    });
    Route::controller(PemasukanController::class)->group(function () {
        Route::get('pemasukan', 'index')->name('pemasukan');
        Route::post('pemasukan/add', 'add')->name('pemasukan.add');
        Route::post('pemasukan/update/{id}', 'update')->name('pemasukan.update');
        Route::get('pemasukan/delete/{id}', 'delete')->name('pemasukan.delete');
    });
    Route::controller(PengeluaranController::class)->group(function () {
        Route::get('pengeluaran', 'index')->name('pengeluaran');
        Route::post('pengeluaran/add', 'add')->name('pengeluaran.add');
        Route::post('pengeluaran/update/{id}', 'update')->name('pengeluaran.update');
        Route::get('pengeluaran/delete/{id}', 'delete')->name('pengeluaran.delete');
    });
    Route::controller(LaporanPemasukanController::class)->group(function () {
        Route::get('laporan-pemasukan', 'index')->name('laporanPemasukan');
        Route::post('laporan-pemasukan/print', 'print')->name('laporanPemasukan.print');

        // Ajax
        Route::get('laporan-pemasukan/cari-data', 'cariData')->name('laporanPemasukan.ajax.cariData');
    });
    Route::controller(LaporanPengeluaranController::class)->group(function () {
        Route::get('laporan-pengeluaran', 'index')->name('laporanPengeluaran');
        Route::post('laporan-pengeluaran/print', 'print')->name('laporanPengeluaran.print');

        // Ajax
        Route::get('laporan-pengeluaran/cari-data', 'cariData')->name('laporanPengeluaran.ajax.cariData');
    });
    Route::controller(LaporanKomulatifController::class)->group(function () {
        Route::get('laporan-komulatif', 'index')->name('laporanKomulatif');
        Route::post('laporan-komulatif/print', 'print')->name('laporanKomulatif.print');

        // Ajax
        Route::get('laporan-komulatif/cari-data', 'cariData')->name('laporanKomulatif.ajax.cariData');
    });
});
