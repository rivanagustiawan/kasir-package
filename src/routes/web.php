<?php 

use Rivan\Kasir\Http\Controllers\KasirController;

Route::group(['namespace' => 'Rivan\Kasir\Http\Controllers'], function () {
    
Route::get('/kasir/{id}', [KasirController::class , 'index'])->name('kasir');

Route::post('/tambah', [KasirController::class , 'tambah_pesanan']);

Route::post('/pesan', [KasirController::class , 'pesan'])->name('pesan');

});


?>