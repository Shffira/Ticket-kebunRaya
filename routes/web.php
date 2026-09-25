<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiketController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Beranda
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Tiket
|--------------------------------------------------------------------------
*/

// Halaman pilih tiket
Route::get('/tiket', [TiketController::class, 'index'])
    ->name('tiket.index');

// Proses menuju pembayaran
Route::post('/pembelian', [TiketController::class, 'pembelian'])
    ->name('tiket.pembelian');

Route::get('/pembelian', function () {
    return redirect()->route('tiket.index');
});

    Route::post('/kirim-bukti', [TiketController::class, 'kirimBukti'])
    ->name('tiket.kirimBukti');


/*
|--------------------------------------------------------------------------
| Syarat & Ketentuan
|--------------------------------------------------------------------------
*/

Route::get('/syarat-ketentuan', function () {
    return view('syarat');
})->name('syarat');


/*
|--------------------------------------------------------------------------
| Aktivitas
|--------------------------------------------------------------------------
*/

Route::get('/aktivitas', function () {
    return view('aktivitas');
})->name('aktivitas');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
  ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


require __DIR__.'/auth.php';