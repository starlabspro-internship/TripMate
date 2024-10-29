<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;

Route::resource('banner', BannerController::class);

Route::get('/', function () {
    return redirect('banner');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add Banner resource routes for CRUD operations
    Route::resource('banners', BannerController::class);
});

require __DIR__.'/auth.php';
