<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::redirect('/', '/home'); //
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/buku')->group(function(){
    Route::redirect('/', '/home'); // alihkan ke home jika dipanggil domain.com/buku
    Route::resource('/kategori',App\Http\Controllers\KategoriController::class);
    Route::resource('/pengarang',App\Http\Controllers\PengarangController::class);
    Route::resource('/rak', App\Http\Controllers\RakController::class);
    Route::resource('/penerbit', App\Http\Controllers\PenerbitController::class);
    Route::resource('/daftar',  App\Http\Controllers\BukuController::class);
});

Route::get('/pengguna', [App\Http\Controllers\PenggunaController::class, 'index']);
Route::get('/pinjam', [App\Http\Controllers\PinjamController::class, 'index']);
Route::get('/dashboard',[app\Http\Controllers\DashboardController::class, 'index']);
Route::get('/denda', [App\Http\Controllers\DendaController::class, 'index']);
Route::get('/laporan',[App\Http\Controllers\LaporanController::class, 'index']);
Route::get('/pengaturan',[App\Http\Controllers\PengaturanController::class, 'index']);
Route::get('/dikembalikan',[App\Http\Controllers\DikembalikanController::class, 'index']);
 