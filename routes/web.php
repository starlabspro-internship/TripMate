<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ContactController;

Route::middleware('ifnotauth')->prefix('trips')->name('trips.')->controller(TripController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/store', 'store')->name('store');
    Route::get('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
    Route::get('/{trip}/edit', 'edit')->name('edit');
    Route::get('/{trip}', 'show')->name('show');
});

Route::middleware('ifnotauth')->prefix('bookings')->name('booking.')->controller(BookingController::class)->group(function () {
    Route::post('/',  'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('auth/google',[SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback',[SocialAuthController::class, 'googleCallback'])->name('login.google.callback');

Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('index');
    Route::get('/edit/{user}', [SuperAdminController::class, 'edit'])->name('edit');
    Route::patch('/{user}', [SuperAdminController::class, 'update'])->name('update');
    Route::get('/{trip}/edit-trip', [SuperAdminController::class, 'edittrip'])->name('edit-trip');
    Route::patch('/trip/{trip}', [SuperAdminController::class, 'updateTrip'])->name('updateTrip');
});

Route::delete('/trips/{trip}', [SuperAdminController::class, 'tripDelete'])->name('trip.delete');
Route::delete('/bookings/{booking}', [SuperAdminController::class, 'bookingDelete'])->name('bookings.destroy');
Route::delete('/users/{user}', [SuperAdminController::class, 'superDelete'])->name('users.destroy');


 Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
 Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');




require __DIR__.'/auth.php';
