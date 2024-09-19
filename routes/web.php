<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

//default
Route::get('/', function () {
    return view('login');
});


//item
//route
Route::get('item_index', [ItemController::class, 'index'])->name('item.index');
Route::get('item_create', [ItemController::class, 'create'])->name('item.create');

//search bar
Route::get('item_search', [ItemController::class, 'search'])->name('item.search');

//controller
Route::resource('item', ItemController::class);


//pesanan
//route
Route::get('pesanan_index', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('pesanan_create', [PesananController::class, 'create'])->name('pesanan.create');

//search bar
Route::get('pesanan_search', [PesananController::class, 'search'])->name('pesanan.search');

//controller
Route::resource('pesanan', PesananController::class);
