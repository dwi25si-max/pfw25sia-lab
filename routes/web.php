<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});
Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/question', [QuestionController::class, 'index'])
        ->name('question.index');

Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.index');

Route::resource('pelanggan', PelangganController::class);
