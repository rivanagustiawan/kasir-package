<?php 

use Rivan\Kasir\Http\Controllers\KasirController;

Route::group(['namespace' => 'Rivan\Kasir\Http\Controllers','middleware' => 'web'], function () {
    
Route::get('/kasir', [KasirController::class , 'index'])->name('kasir');

Route::post('/tambah', [KasirController::class , 'tambah_pesanan']);

Route::post('/check/stok', [KasirController::class , 'cek_stok']);

Route::post('/pesan', [KasirController::class , 'pesan'])->name('pesan');

});


?>