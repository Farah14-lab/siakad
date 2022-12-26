<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
Route::resource('mahasiswa', MahasiswaController::class);

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

Route::get('/home', function () {
    return view('welcome');
});

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/search', [MahasiswaController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('mahasiswa/nilai/{Nim}', [MahasiwaController::class, 'nilai'])->name('nilai');

Route::get('cetak_pdf/{Nim}',[MahasiwaController::class, 'cetak_pdf']);

Route::get('/mig', function () {
    // Call and Artisan command from within your application.
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
});

Route::get('/cc', function () {
    // Call and Artisan command from within your application.
    Artisan::call('config:clear');
});
