<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [DataController::class, 'index'])->name('index');
Route::get('/create', [DataController::class, 'create'])->name('create');
Route::post('/store', [DataController::class, 'store'])->name('store');
Route::get('/{Data}', [DataController::class, 'show'])->name('show');
Route::get('/{Data}/edit', [DataController::class, 'edit'])->name('edit');
Route::put('/{Data}', [DataController::class, 'update'])->name('update');
Route::delete('/{Data}', [DataController::class, 'destroy'])->name('destroy');