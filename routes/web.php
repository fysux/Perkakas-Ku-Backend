<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SellController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;   


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/daftar', function () {
    return view('register');
})->name('register');

Route::get('/jualbarang', [SellController::class, 'index'])->name('jual');

Route::get('/usermaster', function () {
    return view('usermaster');
})->name('upgrade');

Route::post('/login', [UserController::class, 'index'])->name('masuk');

Route::post('/daftar', [UserController::class, 'newuser'])->name('daftar');

Route::post('/jualbarang', [SellController::class, 'store'])->name('jualbarang');

Route::post('/usermaster', [UserController::class, 'upgrade'])->name('upgradeakun');

Route::get('/beli/{barangID?}', function ($barangID = null) {
    if ($barangID) {
        // Lakukan sesuatu dengan $barangID, misalnya mengambil barang dari database
        $barang = \App\Models\Barang::findOrFail($barangID);
        
        // Kirim data barang ke tampilan beli.blade.php
        return view('beli', ['barang' => $barang]);
    } else {
        // Logika jika tidak ada parameter barangID
    }
})->name('beli');

Route::post('/beli', [OrderController::class, 'index'])->name('belibarang');

Route::get('/keranjang', function () {
    return view('pesanan');
})->name('pesanan');

Route::get('/search', [SellController::class, 'search'])->name('search');

// rute keluar
Route::get('/logout', function () {
    // Lakukan sesuatu ketika user keluar
    Auth::logout();
    return redirect('/welcome');
})->name('logout');

Route::get('/barangsaya', [UserController::class, 'barang'])->name('barang');

// edit barang
Route::get('/editbarang/{barangID}', [UserController::class, 'editbarang'])->name('editbarang');

Route::post('/editbarang/{barangID}', [UserController::class, 'update'])->name('updatebarang');

Route::get('/delete/{barangID}', [UserController::class, 'delete'])->name('deletebarang');
