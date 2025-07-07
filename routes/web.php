<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dosencontroller;
use App\Http\Controllers\stafcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dosen', [dosencontroller::class, 'index'])->name('dosen');
Route::get('/staf', [stafcontroller::class, 'index'])->name('staf');
Route::post('/dosen/store', [dosencontroller::class, 'store'])->name('dosen.store');
Route::post('/staf/store', [stafcontroller::class, 'store'])->name('staf.store');
Route::get('/dosen/{id}/edit', [dosencontroller::class, 'edit'])->name('dosen.edit');
Route::put('/dosen/{id}/update',[dosencontroller::class, 'update'])->name('dosen.update');
Route::get('/staf/{id}/edit', [stafcontroller::class, 'edit'])->name('staf.edit');
Route::put('/staf/{id}/update',[stafcontroller::class, 'update'])->name('staf.update');
Route::delete('/dosen/{id}/delete',[dosencontroller::class, 'destroy'])->name('dosen.delete');
Route::delete('/staf/{id}/delete',[stafcontroller::class, 'destroy'])->name('staf.delete');
