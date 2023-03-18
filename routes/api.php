<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PinjamController;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-buku', function(){
    return Buku::all();
});
Route::post('/simpan-pinjam', [PinjamController::class, 'store']);
Route::post('/kembalikan', [PinjamController::class, 'update'])->name('dikembalikan');
Route::post('/cari-laporan', [LaporanController::class, 'store'])->name('cari-laporan');
Route::post('/cari-buku', function(Request $id_buku){
    //json response
    Log::info("id_buku: " ,[$id_buku->id_buku]);
    return response()->json(Buku::find($id_buku->id_buku));
})->name('cari-buku');
