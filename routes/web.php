<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;

Route::resource('banner', BannerController::class);

Route::get('/', function () {
    return view('home');
});

Route::get('/banner', function () {
    return redirect('banner');
});


Route::middleware('auth')->group(function () {
    Route::resource('banners', BannerController::class);
});

//example route
Route::get('/example', function () {
    return view('example.index');
})->name('example');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');

});



require __DIR__.'/auth.php';
